<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonial.index', compact('testimonials'));
    }
    public function create()
    {
        return view('backend.testimonial.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'client_name' => 'required',
            'designation' => 'required',
            'feedback' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'client_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $request->file('logo')->move(public_path('assets/img/testimonial/client-logo/'), $request->file('logo')->getClientOriginalName());
        $request->file('client_pic')->move(public_path('assets/img/testimonial/client-profile-pic/'), $request->file('client_pic')->getClientOriginalName());

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->client_name = $request->client_name;
        $testimonial->designation = $request->designation;
        $testimonial->feedback = $request->feedback;
        $testimonial->logo = 'assets/img/testimonial/client-logo/'  . $request->file('logo')->getClientOriginalName();
        $testimonial->client_pic = 'assets/img/testimonial/client-profile-pic/'  . $request->file('client_pic')->getClientOriginalName();
        $testimonial->save();

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial created successfully.');
    }
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonial.edit', compact('testimonial'));
    }
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'client_name' => 'required',
            'designation' => 'required',
            'feedback' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'client_pic' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $imagePath = public_path('assets/img/testimonial/client-logo/');
            $imageName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($imagePath, $imageName);
            $data['logo'] = 'assets/img/testimonial/client-logo/' . $imageName;
        }

        if ($request->hasFile('client_pic')) {
            $sideImagePath = public_path('assets/img/testimonial/client-profile-pic/');
            $sideImageName = $request->file('client_pic')->getClientOriginalName();
            $request->file('client_pic')->move($sideImagePath, $sideImageName);
            $data['client_pic'] = 'assets/img/testimonial/client-profile-pic/' . $sideImageName;
        }

        $testimonial->update($data);

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial deleted successfully');
    }
}
