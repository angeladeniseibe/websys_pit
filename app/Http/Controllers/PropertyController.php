<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    // ─────────────────────────────────────────
    //  READ
    // ─────────────────────────────────────────

    /**
     * GET /properties
     */
    public function index()
    {
        // Querying from PostgreSQL directly without development mock overrides
        try {
            $properties = DB::table('property')->orderBy('property_id')->get();
        } catch (\Exception $e) {
            $properties = collect([]);
        }

        $currentRole = $this->getCurrentRole();

        return view('properties.index', compact('properties', 'currentRole'));
    }

    // ─────────────────────────────────────────
    //  CREATE (admin only)
    // ─────────────────────────────────────────

    /**
     * GET /properties/create
     */
    public function create()
    {
        $this->requireAdmin();
        $branches = Branch::all();
        return view('properties.create', ['branches' => $branches]);
    }

    /**
     * POST /properties
     */
    public function store(Request $request)
    {
        $this->requireAdmin();

        $validated = $request->validate([
            'property_id' => 'required|string|max:20|unique:property,property_id',
            'type'        => 'required|string|max:50',
            'rent'        => 'required|numeric|min:0',
            'street'      => 'required|string|max:255',
            'city'        => 'required|string|max:100',
            'postcode'    => 'nullable|string|max:20',
            'owner_id'    => 'nullable|string|max:20',
            'branch_no'    => 'nullable|string|max:20'
        ]);

        DB::table('property')->insert($validated);

        return redirect()
            ->route('properties.index')
            ->with('success', "Property {$validated['property_id']} has been successfully added to Postgres.");
    }

    // ─────────────────────────────────────────
    //  EDIT / UPDATE (admin only)
    // ─────────────────────────────────────────

    /**
     * GET /properties/{id}/edit
     */
    public function edit(string $id)
    {
        $this->requireAdmin();

        $property = DB::table('property')->where('property_id', $id)->first();

        if (!$property) {
            abort(404, 'Property record not found.');
        }

        return view('properties.create', compact('property'));
    }

    /**
     * PUT /properties/{id}
     */
    public function update(Request $request, string $id)
    {
        $this->requireAdmin();

        $property = DB::table('property')->where('property_id', $id)->first();

        if (!$property) {
            abort(404, 'Property record not found.');
        }

        $validated = $request->validate([
            'type'     => 'required|string|max:50',
            'rent'     => 'required|numeric|min:0',
            'street'   => 'required|string|max:255',
            'city'     => 'required|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'owner_id' => 'nullable|string|max:20',
        ]);

        DB::table('property')->where('property_id', $id)->update($validated);

        return redirect()
            ->route('properties.index')
            ->with('success', "Property {$id} updated successfully.");
    }

    // ─────────────────────────────────────────
    //  DELETE (admin only)
    // ─────────────────────────────────────────

    /**
     * DELETE /properties/{id}
     */
    public function destroy(string $id)
    {
        $this->requireAdmin();

        $deleted = DB::table('property')->where('property_id', $id)->delete();

        if (!$deleted) {
            abort(404, 'Property record not found.');
        }

        return redirect()
            ->route('properties.index')
            ->with('success', "Property {$id} removed from persistent storage.");
    }

    // ─────────────────────────────────────────
    //  HELPERS (SECURED)
    // ─────────────────────────────────────────

    /**
     * Determine role using simulation session with database enforcement verification.
     */
    private function getCurrentRole(): string
    {
        // Fallback default if not logged in
        if (!auth()->check()) {
            return 'client';
        }

        $trueDatabaseRole = strtolower(auth()->user()->role);

        // If a simulation session exists
        if (session()->has('user_role')) {
            $simulatedRole = session('user_role');

            // Hard Restriction: If they are simulating an admin, verify they are actually an admin in the DB
            if ($simulatedRole === 'admin' && $trueDatabaseRole !== 'admin') {
                session(['user_role' => 'client']); // Force-reset their session exploit
                return 'client';
            }

            return $simulatedRole;
        }

        return $trueDatabaseRole;
    }

    /**
     * Abort with 403 if the current context is not admin.
     */
    private function requireAdmin(): void
    {
        if ($this->getCurrentRole() !== 'admin') {
            abort(403, 'This action is strictly restricted to system administrators.');
        }
    }

        public function getRent(string $id)
    {
        $property = \DB::table('property')->where('property_id', $id)->first();

        if (!$property) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json(['rent' => $property->rent]);
    }

}
