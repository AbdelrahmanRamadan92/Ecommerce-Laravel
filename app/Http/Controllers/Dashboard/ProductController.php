<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    use FileTrait;
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
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('filename')) {

            DB::beginTransaction();
            try {
                $product->save();
                $imageId = $product->image->id;
                $this->updateFile($request, 'filename', 'uploads', 'products', $imageId);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
        } else {
            $product->save();
        }

        session()->flash('update');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $imageId = $product->image->id;
        $deletedProduct = $product->delete();
        if ($deletedProduct) {
            $this->deleteFileIfExists('uploads', 'products', $imageId);
            session()->flash('delete');
            return redirect()->route('products.index');
        }
        return redirect()->back();
    }
}
