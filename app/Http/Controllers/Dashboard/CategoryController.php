<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use FileUploadTrait;
    

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('dashboard.categories.index',compact('categories'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:50|min:3',
            'filename' => 'required|image|mimes:png,jpg|max:2048',
        ]);
        /**
         * Starting Database Transaction. 
         */
        DB::beginTransaction();
        try {
            // Perform your database operations within the transaction
            $category = New Category;
            $category->name = $request->name;
            $category->save();
            $this->uploadFile($request,'filename','categories','uploads',$category->id,'App\Models\Category');

            // If everything is successful, commit the transaction
            DB::commit();
            session()->flash('add');
            return redirect()->route('categories.index');
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
