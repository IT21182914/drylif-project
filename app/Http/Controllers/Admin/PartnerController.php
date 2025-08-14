<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    //
    public function index()
    {
        $partners = Partner::all();
        return view('backend.partner.index', compact('partners'));
    }
    public function create()
    {
        return view('backend.partner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $request->file('logo')->move(public_path('assets/img/partner/logo/'), $request->file('logo')->getClientOriginalName());

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->logo = 'assets/img/partner/logo/'  . $request->file('logo')->getClientOriginalName();
        $partner->save();

        return redirect()->route('partner.index')
            ->with('success', 'Partner created successfully.');
    }
    public function edit(Partner $partner)
    {
        return view('backend.partner.edit', compact('partner'));
    }
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $imagePath = public_path('assets/img/partner/logo/');
            $imageName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($imagePath, $imageName);
            $data['logo'] = 'assets/img/partner/logo/' . $imageName;
        }

        $partner->update($data);

        return redirect()->route('partner.index')
            ->with('success', 'Partner updated successfully');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partner.index')
            ->with('success', 'Partner deleted successfully');
    }
}
