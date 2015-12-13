<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Form;
use App;
use Illuminate\Support\Facades\Input;

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
        $categories = [''=>''] + App\category::lists('name','id')->all();

        $category = App\category::where('name', $name)->lists('id');
               
        $data = array();

        //array_unshift($categories, "scegli la categoria"); 

        $data['categories'] = $categories;//$categories_options;


        if(isset($category[0]) && !empty($category[0]) && $category[0]!=0)
        {
            $brandsSelected = [''=>''] + App\brand::where('category_id',$category[0])
            ->lists('name','id')->all();
            $brands = Form::select('brand',$brandsSelected,
                null,
                ['class' => 'form-control']);
            
            $data['selected_category'] = $category[0];

        }else{
            $brands = "<select class = \"form-control\"></select>";
            $data['selected_category'] = null;
        }

        $data['brands'] = $brands;
        

        return view('search',compact(array('data',$data)));
    }

    public function getBrandsSelect()
    {

    }

    public function getModelsSelect(Request $request)
    {

        $brand_id = Input::get('brand_id');
        $modelsSelected = ['0'=>'Seleziona il modello'] + App\car_model::where('brand_id',$brand_id)
            ->lists('name','id')->all();

        return json_encode($modelsSelected);

    }

    public function getEnginesSelect(Request $request)
    {
        $model_id = Input::get('model_id');
        $enginesSelected = ['0'=>'Seleziona il motore'] + App\engine::where('model_id',$model_id)
                ->lists('name','id')->all();

        return json_encode($enginesSelected);
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

}
