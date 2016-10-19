<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\QuotationDetails;
use App\Quotation;
use App\ItemImage;
use App\Item;
use Request;
use Response;

class QuotationDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // View Items
    public function viewItem(){
        if(Request::ajax()){
          $items = Quotation::join('quotation_details','quotations.id','=','quotation_details.quotation_id')
          ->join('items','items.id','=','quotation_details.item_id')
          ->join('item_images','item_images.item_id','=','items.id')
          ->select('*','quotation_details.id as qDetail_id')
          ->where('quotations.id','=',Input::get('id'))
          ->groupBy('items.id')
          ->get();
          return Response::json($items);
        }
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
