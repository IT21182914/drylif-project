<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'span' => 'required',
            'header' => 'required',
            'paragraph' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'side_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $request->file('image')->move(public_path('assets/img/category/banner/'), $request->file('image')->getClientOriginalName());
        $request->file('side_image')->move(public_path('assets/img/category/banner/'), $request->file('side_image')->getClientOriginalName());

        $category = new Category();
        $category->name = $request->name;
        $category->span = $request->span;
        $category->header = $request->header;
        $category->paragraph = $request->paragraph;
        $category->image = 'assets/img/category/banner/'  . $request->file('image')->getClientOriginalName();
        $category->title = $request->title;
        $category->side_image = 'assets/img/category/banner/'  . $request->file('side_image')->getClientOriginalName();
        $category->save();

        return redirect()->route('category.index')
            ->with('success', 'Category created successfully.');
    }
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'span' => 'required',
            'header' => 'required',
            'paragraph' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'side_image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = public_path('assets/img/category/banner/');
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($imagePath, $imageName);
            $data['image'] = 'assets/img/category/banner/' . $imageName;
        }

        if ($request->hasFile('side_image')) {
            $sideImagePath = public_path('assets/img/category/banner/');
            $sideImageName = $request->file('side_image')->getClientOriginalName();
            $request->file('side_image')->move($sideImagePath, $sideImageName);
            $data['side_image'] = 'assets/img/category/banner/' . $sideImageName;
        }

        $category->update($data);

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully');
    }
}
