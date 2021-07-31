<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStore;
use App\Http\Resources\Admin\CategoryCollection;
use App\Models\Category;
use App\Models\ProductSold;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        $count=count($category);
        return response()->json([
            'status'=>'ok',
            'data'=>[
                'categories'=>CategoryCollection::collection($category),
                'count'=>$count
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {

        if (auth()->user()->type === 'admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
            ];
            $category = Category::create($data);
            return response()->json([
                'status' => 'ok',
                'data' => new CategoryCollection($category)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json([
            'status'=>'ok',
            'data'=>new CategoryCollection($category)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (auth()->user()->type === 'admin') {
            return response()->json([
                'status' => 'ok',
                'data' => new CategoryCollection($category)
            ]);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStore $request, Category $category)
    {

        if (auth()->user()->type === 'admin') {
            $data = [
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
            ];
            $category->update($data);
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (auth()->user()->type === 'admin') {
            $category->delete();
        }
        else{
            return response()->json([
                'status'=>'Error',
                'massage'=>'شما دسترسی ندارید'
            ]);
        }
    }

    public function byCategory($id)
    {
        $category=Category::query()->where('id',$id)->first();
        $product=$category->products;
        $productSold=ProductSold::query()->whereIn('product_id',$product)->where('status',1)->get();
        $count=count($productSold);
        return response()->json([
            'status'=>'ok',
            'data'=>$count
        ]);
    }

}
