<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\DB;
class StrategieController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id = $id;
         return view("strategie.strategieEditDate",compact('id'));
    }

   

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function echeance(Request $request , $id)
    {
        $id = $id;
        
        $date = $request->date;
       
       Session::put('date',$date);
       $echeances = DB::select('select DISTINCT echeance from strategie where date = ?', [$date]);
       
         return view('strategie.strategieEditEcheance',compact('echeances','id'));
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prix(Request $request , $id)
    {
        $id = $id;
       $date = Session::get('date');
       $echeance = $request->echeance;
       
       Session::put('echeance',$echeance);
       $prixx = DB::select('select DISTINCT prix from strategie where date=? and echeance = ?', [$date,$echeance]);

         return view('strategie.strategieEditPrix',compact('prixx','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resultats(Request $request, $id)
    {
        $id = $id;
        $prix = $request->prix;
        $date = Session::get('date');
        $echeance = Session::get('echeance');
        
        $resultats = DB::select('select tresorieMax,tresorieMin,prixAchatPut,prixVenteContrat,meileurSt from strategie where date = ? and echeance = ? and prix = ?', [$date,$echeance,$prix]);
        
        return view('strategie.strategieShow',compact('resultats','date','prix','echeance','id'));
    }


    



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
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
