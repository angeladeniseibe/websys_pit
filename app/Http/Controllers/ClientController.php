<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $clients = Client::query()
            ->when($search, function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%");
            })
            ->orderBy('client_id', 'desc')
            ->paginate(10);

        return view('clients.index', compact('clients', 'search'));
    }

   public function myProfile()
{
    $user = auth()->user();

    // check if user is a registered client
    $client = Client::where('user_id', $user->id)->first();

    if (!$client) {
        abort(403, 'Access denied. Not a registered client.');
    }

    return view('clients.my-profile', compact('client'));
}
}