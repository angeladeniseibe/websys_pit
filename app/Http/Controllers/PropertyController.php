<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    // ─────────────────────────────────────────
    //  HELPERS
    // ─────────────────────────────────────────

    /**
     * Abort with 403 if the current session is not admin.
     */
    private function requireAdmin(): void
    {
        if (session('user_role') !== 'admin') {
            abort(403, 'This action is restricted to administrators.');
        }
    }

    // ─────────────────────────────────────────
    //  READ (clients + admins)
    // ─────────────────────────────────────────

    /**
     * GET /properties
     * List all properties. Both clients and admins can access this.
     * Admins additionally see Edit / Delete controls in the view.
     */
    public function index()
    {
        try {
            $properties = DB::table('Property')->orderBy('property_id')->get();
        } catch (\Exception $e) {
            $properties = collect([]);
        }

        // Fallback demo row so the UI is never blank during development
        if ($properties->isEmpty()) {
            $properties = collect([
                (object)[
                    'property_id' => 'P001',
                    'type'        => 'Flat',
                    'rent'        => 1200.00,
                    'street'      => '10 Elm Street',
                    'city'        => 'Manchester',
                    'postcode'    => 'M1 4AB',
                    'owner_id'    => 'O001',
                ],
            ]);
        }

        return view('properties.index', compact('properties'));
    }

    // ─────────────────────────────────────────
    //  CREATE (admin only)
    // ─────────────────────────────────────────

    /**
     * GET /properties/create
     * Show the "Add Property" form.
     */
    public function create()
    {
        $this->requireAdmin();

        return view('properties.create');
    }

    /**
     * POST /properties
     * Persist a new property record.
     */
    public function store(Request $request)
    {
        $this->requireAdmin();

        $validated = $request->validate([
            'property_id' => 'required|string|max:20|unique:Property,property_id',
            'type'        => 'required|string|max:50',
            'rent'        => 'required|numeric|min:0',
            'street'      => 'required|string|max:255',
            'city'        => 'required|string|max=100',
            'postcode'    => 'nullable|string|max:20',
            'owner_id'    => 'nullable|string|max:20',
        ]);

        DB::table('Property')->insert($validated);

        return redirect()
            ->route('properties.index')
            ->with('success', "Property {$validated['property_id']} has been added.");
    }

    // ─────────────────────────────────────────
    //  EDIT / UPDATE (admin only)
    // ─────────────────────────────────────────

    /**
     * GET /properties/{id}/edit
     * Show the pre-filled edit form.
     */
    public function edit(string $id)
    {
        $this->requireAdmin();

        $property = DB::table('Property')->where('property_id', $id)->first();

        if (! $property) {
            abort(404, 'Property not found.');
        }

        return view('properties.create', compact('property'));
        // The create/edit view detects $property to switch between insert/update modes.
    }

    /**
     * PUT /properties/{id}
     * Apply updates to an existing property.
     */
    public function update(Request $request, string $id)
    {
        $this->requireAdmin();

        $property = DB::table('Property')->where('property_id', $id)->first();

        if (! $property) {
            abort(404, 'Property not found.');
        }

        $validated = $request->validate([
            'type'     => 'required|string|max:50',
            'rent'     => 'required|numeric|min:0',
            'street'   => 'required|string|max:255',
            'city'     => 'required|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'owner_id' => 'nullable|string|max:20',
        ]);

        DB::table('Property')->where('property_id', $id)->update($validated);

        return redirect()
            ->route('properties.index')
            ->with('success', "Property {$id} has been updated.");
    }

    // ─────────────────────────────────────────
    //  DELETE (admin only)
    // ─────────────────────────────────────────

    /**
     * DELETE /properties/{id}
     * Remove a property record.
     */
    public function destroy(string $id)
    {
        $this->requireAdmin();

        $deleted = DB::table('Property')->where('property_id', $id)->delete();

        if (! $deleted) {
            abort(404, 'Property not found.');
        }

        return redirect()
            ->route('properties.index')
            ->with('success', "Property {$id} has been removed.");
    }
}