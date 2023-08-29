<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use FileTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
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
            'name' => ['required', 'string', 'unique:categories', 'max:50', 'min:3'],
            'filename' => ['required', 'image', 'mimes:png,jpg', 'max:2048'],
        ]);
        /**
         * Starting Database Transaction. 
         */
        DB::beginTransaction();
        try {
            // Perform your database operations within the transaction
            $category = new Category;
            $category->name = $request->name;
            $category->save();
            $this->uploadFile($request, 'filename', 'categories', 'uploads', $category->id, 'App\Models\Category');

            // If everything is successful, commit the transaction
            DB::commit();
            session()->flash('add');
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            /**
             * rolling back Database Transaction if an exception occured. 
             */
            DB::rollBack();
            // Handle or log the exception
            throw $th;
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
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:categories,name,' . $category->id, 'max:50', 'min:3'],
            'filename' => ['nullable', 'image', 'mimes:png,jpg', 'max:2048'],
        ]);

        $category->name = $request->name;

        if ($request->hasFile('filename')) {

            DB::beginTransaction();
            try {
                $category->save();
                $imageId = $category->image->id;
                $this->updateFile($request, 'filename', 'uploads', 'categories', $imageId);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                // Handle or log the exception
                throw $th;
            }
        } else {
            $category->save();
        }
        session()->flash('update');
        return redirect()->route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $imageId = $category->image->id;
        $deletedCategory = $category->delete();
        if ($deletedCategory) {
            $this->deleteFileIfExists('uploads', 'categories', $imageId);
            session()->flash('delete');
            return redirect()->route('categories.index');
        }
        return redirect()->back();
    }
}
