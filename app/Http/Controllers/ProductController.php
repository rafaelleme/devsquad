<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductTag;
use App\ProductImage;
use App\ProductImport;
use App\Tag;
use Illuminate\Http\Request;
use Validator;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('deleted','=',0)
            ->get();

        return view('admin.product.list',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.product.create',['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subName' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required',
            'tags' => 'required|array|min:1'
        ]);

      

        $product = new Product;

        $product->name = $request->name;
        $product->subName = $request->subName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->imgs) {
            $images = explode(',',$request->imgs);

            if (!empty($images)) {
                foreach ($images as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'name' => $image
                    ]);
                }
            }
        }

        if (!empty($request->tags)) {
            foreach ($request->tags as $tag) {
                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag
                ]);
            }
        }

        Session::flash('message', 'Record created successfully'); 

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {  
        $tags = Tag::all();

        $productTags = [];
        
         foreach ($product->tags as $tag) {
            $productTags[] = $tag->tag_id;
        }

        return view('admin.product.edit',['product' => $product,'productTags' => $productTags,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'subName' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required',
            'tags' => 'required|array|min:1'
        ]);

        $product->name = $request->name;
        $product->subName = $request->subName;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->update();

        if ($request->imgs) {
            $images = explode(',',$request->imgs);

            if (!empty($images)) {
                foreach ($images as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'name' => $image
                    ]);
                }
            }
        }

        if (!empty($request->tags)) {
            ProductTag::where('product_id','=',$product->id)
                ->delete();

            foreach ($request->tags as $tag) {
                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag
                ]);
            }
        }

        Session::flash('message', 'Record successfully changed'); 

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->deleted = 1;
        $product->update();

        Session::flash('message', 'Record has been removed');

        return redirect()->route('products.index');
    }

    public function upload(Request $request)
    {
        $nameFile = null;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {

            $this->validate($request, [
                'file' => 'mimes:png,jpg,jpeg'
            ]);
            
            $nameFile = uniqid(date('HisYmd')) . '.' . $request->file->extension();

            $upload = $request->file->storeAs('public/products', $nameFile);

            if (!$upload) {
                return false;
            }

            return response()->json([
                'file' => $nameFile,
            ]);
        }
    }

    public function uploadCsv(Request $request)
    {
        if ($request->hasFIle('file') && $request->file('file')->isValid()) {

            $this->validate($request, [
                'file' => 'mimes:csv,txt'
            ]);

            $name = uniqid(date('HisYmd')) . '.' . ($request->file->extension() == 'txt' ? 'csv' : $request->file->extension()) ;

            $upload = $request->file->storeAs('import/product', $name);

            if (!$upload) {
                return false;
            }

            ProductImport::create([
                'name' => $name
            ]);
        } 
    }

    public function list(Product $product)
    {
        $tags = [];

        if (!empty($product->tags)) {
            foreach ($product->tags as $tag) {
                $tags[] = Tag::find($tag->tag_id)->name;
            }
        }

        return view('product',['product' => $product,'tags' => $tags]);
    }
}
