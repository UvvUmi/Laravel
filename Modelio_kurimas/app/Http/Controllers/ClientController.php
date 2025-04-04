<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function displayClients()
    {
        $clients = Client::all();
        return view('clients', compact('clients'));
    }
}
