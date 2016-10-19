<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Storage;
use App\Item;
use Carbon\Carbon;
use File;
use App\Customer;
use App\QuotationDetails;
use App\Quotation;
use Request;
use Response;
use Auth;

class QuotationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotation::with(['customer','user'])->where('isActive','=',1)->get();
        $items = Item::where('isActive','=',1)->get();
        // dd($quotations->lists('customer'));
        return view('dashboard.quotations.quotations',compact('quotations','items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::where('isActive','=',1)->get();
        return view('dashboard.quotations.new',compact('items'));
    }

    //Save Quotation
    public function saveQuotation(){
        try {
            $quotation = new Quotation;
            $quotation->projectName = Input::get('projectName');
            $quotation->customer_id = Input::get('customer_id');
            $quotation->user_id = Auth::user()->id;
            $quotation->save();

            // $quotation = Quotation::find($quotation->id);
            $quotation->customID = Auth::user()->branchID.''.Carbon::now()->format('Ymd').''.$quotation->id;
            $quotation->save();

            // Save Quotation Details
            $items = Input::get('id');
            $prices = Input::get('price');
            $qty = Input::get('quantity');
            // dd($prices);
            $ctr = 0;
            foreach ($items as $index => $item) {
               $qDetails = new QuotationDetails;
               $qDetails->item_id = $item;
               $qDetails->quotation_id = $quotation->id;
               $qDetails->quantity = $qty[$index];
               $qDetails->adjusted_price = $prices[$index];
               $qDetails->save();
               // dd($qDetails);
            }
            // $quotations = Quotation::with(['customer','user'])->where('isActive','=',1)->get();
            // $items = Item::where('isActive','=',1)->get();
            return redirect('/quotations')
            ->withFlashMessage('Quotation has been added!');
            
        } catch (Exception $e) {
            return back()
            ->withFlashMessage('Cannot Add Quotation. Something went wrong :(');
        }
        
        // dd($qDetails);
    }

    //Save Edited Quotation
    public function editQuotation(){
        $id = Input::get('quotation_id');
        $quotation = Quotation::find($id);
        if (Input::get('cancel_reason') != null) {
            $quotation->cancel_reason = Input::get('cancel_reason');
            $quotation->status = 2;
            $quotation->save();
        }else{
            $quotation->projectName = Input::get('projectName');
            $quotation->customer_id = Input::get('customer_id');
            $quotation->user_id = Auth::user()->id;
            $quotation->discount = Input::get('discount');
            $quotation->save();

            // Save Quotation Details
            $items = Input::get('id');
            $prices = Input::get('price');
            $qty = Input::get('quantity');
            $qDetails_id = Input::get('qDetails_id');
            // dd($prices);
            $ctr = 0;
            foreach ($items as $index => $item) {
               $qDetails = QuotationDetails::find($qDetails_id[$index]);
               $qDetails->item_id = $item;
               $qDetails->quotation_id = $quotation->id;
               $qDetails->quantity = $qty[$index];
               $qDetails->adjusted_price = $prices[$index];
               $qDetails->save();
               // dd($qDetails);
            }
            // $quotations = Quotation::with(['customer','user'])->where('isActive','=',1)->get();
            // $items = Item::where('isActive','=',1)->get();
        }
        return redirect('/quotations')
        ->withFlashMessage('Quotation has been added!');
    }

    //Deal a Project
    public function dealProject(){
        if(Request::ajax()){
            $quotation = Quotation::find(Input::get('id'));
            $quotation->status = 1;
            $quotation->save();
        }
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