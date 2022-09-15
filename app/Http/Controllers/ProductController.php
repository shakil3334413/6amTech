<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data["category"] = Category::latest()->get();
        $data["variant"] = Variant::latest()->get();
        return view("product", compact("data"));
    }

    public function getData()
    {
        $data = Product::with("category", "variant")->latest()->get();
        return response()->json($data);
    }

    public function store(ProductRequest $request)
    {
        try {
            $data = new Product;
            $data->name = $request->name;
            $data->price = $request->price;
            $data->category_id = $request->category_id;
            $data->user_id = Auth::user()->id;
            if (!empty($request->size_id)) {
                $data->size_id = $request->size_id;
            }
           $data->image = $this->imageUpload($request, 'image', 'Uploads/product') ?? '';
            $data->status = $request->status;
            $data->save();
            return response()->json("Product Created Successfully");
        } catch (\Throwable $e) {
            return response()->json("Something went wrong" . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = Product::find($id);
        return response()->json($data);
    }

    public function update(ProductRequest $request)
    {
        try {
            $data = Product::find($request->id);
            if ($request->hasFile('image')) {
                if (!empty($data->image) && file_exists($data->image)) {
                    unlink($data->image);
                }
                $image= $this->imageUpload($request, 'image', 'Uploads/product');
            }else{
                $image= $data->image;
            }
            $data->name = $request->name;
            $data->price = $request->price;
            $data->category_id = $request->category_id;
            $data->user_id = Auth::user()->id;
            if (!empty($request->size_id)) {
                $data->size_id = $request->size_id;
            }
            $data->status = $request->status;
            $data->image= $image;
            $data->update();
            return response()->json("Product updated Successfully");
        } catch (\Throwable $e) {
            return response()->json("Something went wrong");
        }
    }
    public function destroy(Request $request)
    {
        try {
            Product::find($request->id)->delete();
            return response()->json("Product delete successfully");
        } catch (\Throwable $e) {
            return response()->json("something went wrong");
        }
    }

    //filter
    public function filter(Request $request)
    {        
        try {
            if($request->status){
                $data = Product::with("category", "variant")->where("status", $request->status)->get();
            }
            if($request->ascdesc){
                $data = Product::with("category", "variant")->orderBy("id", $request->ascdesc)->get();
            }
            if($request->price) {
                $data = Product::with("category", "variant")->whereBetween("price", [0, (int)$request->price])->get();
            }
            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json("something went wrong");
        }
    }
}
