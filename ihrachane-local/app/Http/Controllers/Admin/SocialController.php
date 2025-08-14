<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('backend.social.index', compact('socials'));
    }
    public function create()
    {
        return view('backend.social.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'link' => 'required',
        ]);


        $social = new Social();
        $social->name = $request->name;
        $social->icon = $request->icon;
        $social->link = $request->link;
        $social->save();

        return redirect()->route('social.index')
            ->with('success', 'Social created successfully.');
    }
    public function edit(Social $social)
    {
        return view('backend.social.edit', compact('social'));
    }
    public function update(Request $request, Social $social)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'link' => 'required',
        ]);

        $data = $request->all();

        $social->update($data);

        return redirect()->route('social.index')
            ->with('success', 'Social updated successfully');
    }

    public function destroy(Social $social)
    {
        $social->delete();

        return redirect()->route('social.index')
            ->with('success', 'Social deleted successfully');
    }
}
