<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class SearchController extends Controller
{

    public function __counstruct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $categories = App\category::lists('name','id');
        //echo $categories;
        $category = App\category::where('name', $name)->lists('id');
               
        $data = array();

        $data['categories'] = $categories;//$categories_options;
        $data['selected_category'] = $category[0];


        return view('search',compact(array('data',$data)));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get the Search view with category selected.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    /*public function getInitializedSearch($name)
    {
        $categories = App\category::all();
        $category = App\category::where('name', $name)->first();
               
        $data = array();

        $categories_options = "";
        foreach($categories as $category)
        {
             $categories_options.="<option value=".$category->id.">".$category->name."</option>";
        }

        $data['categories'] = $categories_options;
        $data['selected_category'] = $category;



        return view('search',compact(array('data',$data)));
    }*/
}
