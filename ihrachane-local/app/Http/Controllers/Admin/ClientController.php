<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index()
    {
        $clients = Client::all();
        return view('backend.client.index', compact('clients'));
    }
    public function create()
    {
        return view('backend.client.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $request->file('logo')->move(public_path('assets/img/client/logo/'), $request->file('logo')->getClientOriginalName());

        $client = new Client();
        $client->name = $request->name;
        $client->logo = 'assets/img/client/logo/'  . $request->file('logo')->getClientOriginalName();
        $client->save();

        return redirect()->route('client.index')
            ->with('success', 'Client created successfully.');
    }
    public function edit(Client $client)
    {
        return view('backend.client.edit', compact('client'));
    }
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $imagePath = public_path('assets/img/client/logo/');
            $imageName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($imagePath, $imageName);
            $data['logo'] = 'assets/img/client/logo/' . $imageName;
        }

        $client->update($data);

        return redirect()->route('client.index')
            ->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')
            ->with('success', 'Client deleted successfully');
    }
}
