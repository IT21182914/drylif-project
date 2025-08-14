<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::all();
        return view('backend.service.index', compact('services'));
    }
    public function create()
    {
        return view('backend.service.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'paragraph' => 'required',
        ]);


        $service = new Service();
        $service->title = $request->title;
        $service->paragraph = $request->paragraph;
        $service->save();

        return redirect()->route('service.index')
            ->with('success', 'Service created successfully.');
    }
    public function edit(Service $service)
    {
        return view('backend.service.edit', compact('service'));
    }
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'paragraph' => 'required',
        ]);

        $data = $request->all();

        $service->update($data);

        return redirect()->route('service.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Service deleted successfully');
    }
}
