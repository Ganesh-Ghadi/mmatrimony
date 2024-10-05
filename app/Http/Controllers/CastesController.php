<?php
namespace App\Http\Controllers;
use Excel;
use Illuminate\Http\Request;
use App\Models\Caste;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CasteRequest;


class CastesController extends Controller
{
    public function index()
    {
        $castes = Caste::orderBy('id', 'desc')->paginate(12);
        return view('castes.index', ['castes' => $castes]);
    }

    public function create()
    {
        return view('castes.create');
    }

    public function store(CasteRequest $request) 
    {
        $input = $request->all();      
        $caste = Caste::create($input); 
        $request->session()->flash('success', 'Caste saved successfully!');
        return redirect()->route('castes.index'); 
    }
  
    public function show(Product $cast)
    {
        return $cast->name;
    }

    public function edit(Caste $caste)
    {
        return view('castes.edit', ['caste' => $caste]);
    }

    public function update(Caste $caste, CasteRequest $request) 
    {
        $caste->update($request->all());
        $request->session()->flash('success', 'Caste updated successfully!');
        return redirect()->route('castes.index');
    }
  
    public function destroy(Request $request, Caste $caste)
    {
        $caste->delete();
        $request->session()->flash('success', 'Caste deleted successfully!');
        return redirect()->route('castes.index');
    }

    public function search(Request $request){
        $data = $request->input('search');
        $products = Product::where('name', 'like', "%$data%")->paginate(12);
        // $employees = Employee::with(['users'])->orderBy('id', 'desc')->paginate(12);

        return view('products.index', ['products'=>$products]);
    }

}
