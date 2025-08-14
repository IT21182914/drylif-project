<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\SubCategoryService;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $clients = Client::all();
        $services = Service::all();
        $testimonials = Testimonial::all();
        return view('site.index', compact('clients', 'services', 'testimonials'));
    }
    public function sourcing()
    {
        $category = Category::find(1);
        $sub_categories = SubCategory::where('category_id', 1)->get();
        $clients = Client::all();
        return view('site.sourcing', compact('category', 'sub_categories', 'clients'));
    }
    public function shipping()
    {
        $category = Category::find(2);
        $sub_categories = SubCategory::where('category_id', 2)->get();
        $partners = Partner::all();
        return view('site.shipping', compact('category', 'sub_categories', 'partners'));
    }
    public function subCategoryShow($slug)
    {
        $sub_category = SubCategory::where('slug', $slug)->first();
        $sub_category_services = SubCategoryService::where('sub_category_id', $sub_category->id)->get();
        return view('site.sub-category-show', compact('sub_category', 'sub_category_services'));
    }
    public function storeContact(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        
        // Create a new contact record
        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
