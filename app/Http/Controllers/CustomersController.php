<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Customer;
use App\Quotation;
use Response;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customers = Customer::where('isActive',1)->get();
        return view('dashboard.customers.customers',compact('Customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Input::get('isEdit') == ""){
            // dd(Input::get('id'));
            $customer = new Customer;
            $customer->first_name=Input::get('first_name');
            $customer->last_name=Input::get('last_name');
            $customer->MI=Input::get('MI');
            $customer->address=Input::get('address');
            $customer->phone=Input::get('phone');
            $customer->email=Input::get('email');
            $customer->contact_person=Input::get('contact_person');
            $customer->TIN=Input::get('TIN');
            $customer->terms=Input::get('terms');
            $customer->save();
            return Redirect::back()->withFlashMessage('
                            Customer is Successfully Added.
                    ');;
        }
        else{
            // dd(Input::get('id'));
            $customer = Customer::find(Input::get('id'));
            $customer->last_name=Input::get('last_name');
            $customer->first_name=Input::get('first_name');
            $customer->MI=Input::get('MI');
            $customer->address=Input::get('address');
            $customer->phone=Input::get('phone');
            $customer->email=Input::get('email');
            $customer->contact_person=Input::get('contact_person');
            $customer->TIN=Input::get('TIN');
            $customer->terms=Input::get('terms');
            $customer->save();
            return Redirect::back()
                ->withFlashMessage('
                            Customer is Successfully updated.
                    ');
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

    // AJAX CALL for Customer Search

    public function customerSearch(){
        if(Request::ajax()){
            $customer = Customer::where('first_name','like','%'.Input::get('key').'%')
                    ->orWhere('last_name','like','%'.Input::get('key').'%')
                    ->get();
            // dd($customer->lists('first_name'));
            return Response::json($customer);
        }
    }

    public function toEditCustomer(){
        if(Request::ajax()){
            $customer = Customer::find(Input::get('id'));
            return Response::json($customer);
        }
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
