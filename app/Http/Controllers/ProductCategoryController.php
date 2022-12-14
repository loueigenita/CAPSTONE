<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProductCategoryRequest;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductCategory $model)
    {
        // $reservations = Reservation::get();
        $categories = ProductCategory::paginate(10);

        return view('inventory.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request, ProductCategory $category)
    {
        $category->create($request->all());

        return redirect()
            ->route('categories.index')
            ->with('toast_success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $category)
    {
        return view('inventory.categories.show', [
            'category' => $category,
            'products' => Product::where('product_category_id', $category->id)->paginate(8)
        ]);
    }
    public function categoryPDF()
    {
        $categories = ProductCategory::get();
        $pdf = PDF::loadView('inventory.categories.category_pdf', compact('categories'));
        return $pdf->stream('Category.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        return view('inventory.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $category)
    {
        $category->update($request->all());

        return redirect()
            ->route('categories.index')
            ->with('toast_success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('toast_success', 'Deleted Successfully');
    }
}
