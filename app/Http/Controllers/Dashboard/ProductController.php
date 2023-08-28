<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::all();
        $categories = Category::all();
        return view('dashboard.products.index', compact(['products', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        /**
         * Starting Database Transaction. 
         */
        DB::beginTransaction();
        try {
            // Perform your database operations within the transaction
            $product = new Product;
            $product->name = $validatedData['name'];
            $product->price = $validatedData['price'];
            $product->category_id = $validatedData['category_id'];

            $product->save();

            /**
             * upload and Store image using uploadFile method in my custom FileUploadTrait.
             */
            $this->uploadFile($request, 'filename', 'products', 'uploads', $product->id, 'App\Models\Product');

            // If everything is successful, commit the transaction
            DB::commit();

            session()->flash('add');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            /**
             * rolling back Database Transaction if an exception occured. 
             */
            DB::rollBack();
            // Handle or log the exception
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
