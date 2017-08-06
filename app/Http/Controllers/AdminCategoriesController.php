<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class AdminCategoriesController extends Controller
{
    /**
     * Display All categories.
     *display 10 category per page
     *and show them in views/admin/categories/index.blade.php
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories=Category::paginate(10);

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required|unique:categories'
            ]);
        Category::create($request->all());
        return redirect('/admin/categories')->with(['message'=>'category created succefully']);
    }



    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category=Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request,[
            'name'=>'unique:categories'
            ]);
        $category=Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/admin/categories')->with(['message'=>'category Updated succefully']);
    }

    /**
     * Remove the Category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
        //
         $category=Category::findOrFail($id);
        $category->delete();
        return redirect('/admin/categories')->with(['message'=>'category  Deleted succefully']);
    }
}
