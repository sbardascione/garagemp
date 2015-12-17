<?php

namespace App\Http\Controllers;

/* use Illuminate\Auth\Access\Response;*/
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Form;
use App;
use Illuminate\Support\Facades\DB;
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

    public function getDataSheetsSelect(Request $request)
    {
        $engine_id = Input::get('engine_id');
        $results =DB::table('data_sheets')
            ->join('pdf_contents','data_sheet_id','=','data_sheets.id')
            ->select('data_sheets.kW','data_sheets.CV','data_sheets.Nm','pdf_contents.description','pdf_contents.id')
            ->where('engine_id',(int)$engine_id)
            ->get();

        return view('results')->with('data',$results);
    }

    public function getPdf(Request $request)
    {
        $pdf_id = Input::get('pdf_id');
        $result = DB::table('pdf_contents')
            ->select('pdf')
            ->where('id',(int)$pdf_id)->first();
        $base_64_pdf = $result->pdf;
        $pdf = base64_decode($base_64_pdf);

        return (new Response($pdf,200))->header('Content-Type','application/pdf');
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
