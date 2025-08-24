<?php

namespace App\Http\Controllers\MainControllers;


use App\Models\category;
use App\Http\Requests\CategoryRequests\IndexCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:categories', ['only' => ['index']]);
        $this->middleware('permission:categories/create', ['only' => ['store']]);
        $this->middleware('permission:categories/update', ['only' => ['update']]);
        $this->middleware('permission:categories/details', ['only' => ['show']]);
        $this->middleware('permission:categories/delete', ['only' => ['destroy']]);
    }



    /**
     * Display a listing of the resource.
     */
    public function index(IndexCategoryRequest $request)
    {
        $query = Category::search($request->search);
        return new CategoryResource($query->paginate($request->limit, 'page', $request->offset));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return self::jsonResponse('success', new CategoryResource(Category::add($request)));
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return self::jsonResponse('success', ['category' => $category]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $category->edit($request);
        return self::jsonResponse('success', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return self::jsonResponse('success');
    }
}
