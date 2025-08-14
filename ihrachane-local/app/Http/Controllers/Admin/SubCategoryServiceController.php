<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryServiceController extends Controller
{
    //
    public function index()
    {
        $sub_category_services = SubCategoryService::all();
        return view('backend.sub-category-service.index', compact('sub_category_services'));
    }
    public function create()
    {

        $sub_categories = SubCategory::all();
        return view('backend.sub-category-service.create', compact('sub_categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'paragraph' => 'nullable|string',
        ]);

        // Create a new SubCategoryService
        $request->file('image')->move(public_path('assets/img/sub-category-service/image/'), $request->file('image')->getClientOriginalName());

        $sub_category_service = new SubCategoryService();
        $sub_category_service->name = $request->name;

        $sub_category_service->sub_category_id = $request->sub_category_id;
        $sub_category_service->paragraph = $request->paragraph;
        $sub_category_service->image = 'assets/img/sub-category-service/image/'  . $request->file('image')->getClientOriginalName();
        $sub_category_service->save();

        return redirect()->route('sub_category_service.index')->with('success', 'Sub Category Service created successfully.');
    }
    public function edit(SubCategoryService $sub_category_service)
    {
        $sub_categories = SubCategory::all();
        return view('backend.sub-category-service.edit', compact('sub_category_service', 'sub_categories'));
    }
    public function update(Request $request, SubCategoryService $sub_category_service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'paragraph' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = public_path('assets/img/category/image/');
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($imagePath, $imageName);
            $data['image'] = 'assets/img/category/image/' . $imageName;
        }


        $sub_category_service->update($data);

        return redirect()->route('sub_category_service.index')
            ->with('success', 'Sub Category Service updated successfully');
    }
    public function destroy(SubCategoryService $sub_category_service)
    {
        $sub_category_service->delete();

        return redirect()->route('sub_category_service.index')
            ->with('success', 'Sub Category Service deleted successfully');
    }
}
