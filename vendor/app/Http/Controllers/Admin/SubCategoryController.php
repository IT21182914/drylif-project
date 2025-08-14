<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubCategoryService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function index()
    {
        $sub_categories = SubCategory::all();
        return view('backend.sub-category.index', compact('sub_categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('backend.sub-category.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'paragraph' => 'nullable|string',
        ]);

        // Create a new SubCategory
        $request->file('banner')->move(public_path('assets/img/sub-category/banner/'), $request->file('banner')->getClientOriginalName());

        $sub_category = new SubCategory();
        $sub_category->title = $request->title;
        $sub_category->slug = Str::slug($request->title);
        $sub_category->category_id = $request->category_id;
        $sub_category->sub_title = $request->sub_title;
        $sub_category->banner = 'assets/img/sub-category/banner/'  . $request->file('banner')->getClientOriginalName();
        $sub_category->save();

        return redirect()->route('sub_category.index')->with('success', 'Sub Category created successfully.');
    }
    public function edit(SubCategory $sub_category)
    {
        $categories = Category::all();
        return view('backend.sub-category.edit', compact('sub_category', 'categories'));
    }
    public function update(Request $request, SubCategory $sub_category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'paragraph' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('banner')) {
            $imagePath = public_path('assets/img/category/banner/');
            $imageName = $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move($imagePath, $imageName);
            $data['banner'] = 'assets/img/category/banner/' . $imageName;
        }


        $sub_category->update($data);

        return redirect()->route('sub_category.index')
            ->with('success', 'Sub Category updated successfully');
    }
    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();

        return redirect()->route('sub_category.index')
            ->with('success', 'Sub Category deleted successfully');
    }
}
