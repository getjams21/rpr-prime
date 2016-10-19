<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\User;
use App\Branch;
use Response;

// use Acme\Repos\User\UserRepository;

class UsersController extends Controller
{
    // private $userRepo;
    // function __construct(UserRepository $userRepo)
    // {
    //     $this->userRepo = $userRepo;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::where('IsActive',1)->get();
        // $branches = Branch::lists('BranchName','id');
        return view('dashboard.users.users',compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Input::get('isEdit'));
        if(Input::get('isEdit') == ""){
            // dd(Input::get('id'));
            $user = new User;
            $user->username=Input::get('username');
            $user->password=Hash::make(Input::get('password'));
            $user->first_name=Input::get('first_name');
            $user->last_name=Input::get('last_name');
            $user->MI=Input::get('MI');
            $user->email=Input::get('email');
            $user->position=Input::get('position');
            $user->branchID=Input::get('branchID');
            $user->save();
            return Redirect::back()->withFlashMessage('
                            User is Successfully Added.
                    ');;
        }
        else{
            // dd(Input::get('id'));
            $user = User::find(Input::get('id'));
            $user->username=Input::get('username');
            $user->last_name=Input::get('last_name');
            $user->first_name=Input::get('first_name');
            $user->position=Input::get('position');
            $user->MI=Input::get('MI');
            $user->email=Input::get('email');
            $user->position=Input::get('position');
            $user->branchID=Input::get('branchID');
            $user->save();
            return Redirect::back()
                ->withFlashMessage('
                            User is Successfully updated.
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

    #To Edit User
    public function toEditUser(){
        if(Request::ajax()){
            $user = User::find(Input::get('id'));
            return Response::json($user);
        }
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
        $user = User::find($id);
        $user->IsActive = 0;
        $user->save();

        return Redirect::back()
            ->withFlashMessage('User is Successfully deactivated.');
    }
}
