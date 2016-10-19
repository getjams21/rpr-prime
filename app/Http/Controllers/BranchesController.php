<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\Branch;
use Response;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Branches = Branch::where('isActive',1)->get();
        return view('dashboard.branches.branches', compact('Branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Input::get('isEdit') == ""){
            $branch = new Branch;
            $branch->name=Input::get('name');
            $branch->address=Input::get('address');
            $branch->phone=Input::get('phone');
            $branch->save();
            return Redirect::back()->withFlashMessage('
                            Branch is Successfully Added.
                    ');;
        }
        else{
            $branch = Branch::find(Input::get('id'));
            $branch->name=Input::get('name');
            $branch->address=Input::get('address');
            $branch->phone=Input::get('phone');
            $branch->save();
            return Redirect::back()
                ->withFlashMessage('
                            Branch is Successfully updated.
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

    #To Edit User
    public function toEditBranch(){
        if(Request::ajax()){
            $branch = Branch::find(Input::get('id'));
            return Response::json($branch);
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
        $user = Branch::find($id);
        $user->isActive = 0;
        $user->save();

        return Redirect::back()
            ->withFlashMessage('Branch is Successfully deactivated.');
    }
}
