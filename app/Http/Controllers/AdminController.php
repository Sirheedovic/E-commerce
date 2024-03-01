<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use BaconQrCode\Renderer\Path\Move;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new category;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'category added successfully');

    }
    public function delete_category($id)
    {
        $data= category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'category deleted successfully');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new products;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->discount_price = $request->dis_price;

       $image = $request->image;
       $image_name = time() . '.' .$image-> getClientOriginalExtension();

       $request->image->move('product', $image_name);
       $product->image = $image_name;

        $product->save();
        return redirect()->back()->with('message', 'product Added Successfully');
    }
    public function show_product()
    {
        $product = Products::all();

        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id)
    {
        $product = products::find($id); 

        $product->delete();

        return redirect()->back()->with('message', 'product deleted successfully');
    }
    public function update_product($id)
    {
        $product = products::find($id);
        $category= Category::all();

       return view('admin.update_product', compact('product', 'category'));
    }
    public function confirm_update(Request $request, $id)
    {
        $product = Products::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        
    
        $image = $request->image;
        $image_name = time() . '. ' . $image->getClientOriginalExtension();

        $request->image -> move('product', $image_name);

        $product->image = $image_name;
        $product->save();

        return redirect()->back()->with('message','updated successfully');
    }
}
