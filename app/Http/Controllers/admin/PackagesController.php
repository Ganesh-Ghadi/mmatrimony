<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Http\Requests\PackageRequest;

class PackagesController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('id', 'desc')->paginate(12);
        return view('admin.packages.index', ['packages' => $packages]);
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(PackageRequest $request) 
    {
        $input = $request->all();      
        $package = Package::create($input); 
        $request->session()->flash('success', 'Package saved successfully!');
        return redirect()->route('packages.index'); 
    }
  
    public function show(Package $package)
    {
        return $package->name;
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', ['package' => $package]);
    }

    public function update(Package $package, PackageRequest $request) 
    {
        $package->update($request->all());
        $request->session()->flash('success', 'package updated successfully!');
        return redirect()->route('packages.index');
    }
  
    public function destroy(Request $request, Package $package)
    {
        $package->delete();
        $request->session()->flash('success', 'Package deleted successfully!');
        return redirect()->route('packages.index');
    }

    public function search(Request $request){
        $data = $request->input('search');
        $package = Package::where('name', 'like', "%$data%")->paginate(12);
 
        return view('admin.packages.index', ['packages'=>$packages]);
    }

}