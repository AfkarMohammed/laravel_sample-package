<?php

namespace  LP\Calculator;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
class CrudController extends Controller
{
    public function index()
    {
        // $products = Product::latest()->paginate(5);
        // return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
        $products = Product::all();
        return view ('products.index')->with('products', $products);
    }

    
    public function create()
    {
        return view('products.create');
    }

   
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'detail' => 'required',
    //     ]);
  
    //     Product::create($request->all());
   
    //     return redirect()->route('product.index')->with('success','Product created successfully.');
    // }
    public function store(Request $request)
    {
       
        $requestData = $request->all();
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/'.$path;
        Product::create($requestData);
        return redirect('product')->with('flash_message', 'Product Addedd!');
    }
    
    
   
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

  
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    
    public function update(Request $request, $id)
    {
       // Find the product to update
    $product = Product::find($id);

    if (!$product) {
        return redirect('product')->with('flash_message', 'Product not found.');
    }

    // Validate the input data if necessary
    $validatedData = $request->validate([
        'name' => 'required',
        'detail' => 'required',
        'price' => 'required|numeric',
        'photo' => 'max:2048', // You can adjust the validation rules for the photo as needed
    ]);

    $requestData = $request->all();

    // Check if a new photo file is provided
    if ($request->hasFile('photo')) {
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = '/storage/' . $path;
    }

    // Update the product with the new data
    $product->update($requestData);

    return redirect('product')->with('flash_message', 'Product Updated!');
    }

   
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
}
