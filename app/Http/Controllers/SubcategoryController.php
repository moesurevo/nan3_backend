<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Subcategory\SubcategoryRepository;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\SubcategoryRequest;

class SubcategoryController extends Controller
{
    public function __construct(SubcategoryRepository $sub_category,CategoryRepository $category){
        $this->middleware('auth');
        $this->sub_category = $sub_category;
        $this->category = $category;    

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_category_data = $this->sub_category->getAllSubcategory(); 
        return view('pages.sub_category.index',compact('sub_category_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category_data = $this->category->getAllCategory();
        return view('pages.sub_category.new',compact('category_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {   

        $sub_category_data = $this->sub_category->createSubcategory($request->all(),'sub_category');
        return redirect('sub_category')->with('status', 'Subcategory is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = $this->sub_category->findOrThrowException($id);
        return view('pages.sub_category.show',compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_data = $this->category->getAllCategory();
        $sub_category = $this->sub_category->findOrThrowException($id);

        return view('pages.sub_category.edit',compact('category_data','sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        $this->sub_category->update($id, $request->all());
        return redirect()->route('sub_category.index')->with('status','Subcategory has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = $this->category->destroyCategory($id);
        // return redirect()->route('category.index')->with('status','Category has been destroyed');
    }
}
