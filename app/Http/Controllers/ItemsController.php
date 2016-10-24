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
use App\ItemImage;
use Request;
use Response;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = Item::with('images')->where('isActive','=',1)->get();
        return view('dashboard.items.items', compact('Items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Save Item Data
        if(Input::get('isEdit') == ""){
            // dd(Input::get('id'));
            $item = new Item;
            $item->name=Input::get('name');
            $item->description=Input::get('description');
            $item->model=Input::get('model');
            $item->price=Input::get('price');
            $item->effectivity_date=Input::get('effectivity_date');
            $item->unit=Input::get('unit');
            $item->type=Input::get('type');
            $item->save();
            // Get the saved item
            $item_id = Item::orderBy('created_at', 'desc')->first();
            // dd($item_id->id);
            // Upload Images
            if (Input::hasFile('images')) {
                // getting all of the post data
                $files = Input::file('images');
                // Making counting of uploaded images
                $file_count = count($files);
                // start count how many uploaded
                $uploadcount = 0;
                // check if files passed validation
                $hasPassed = false;
                foreach($files as $file) {
                  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                  $validator = Validator::make(array('file'=> $file), $rules);
                  if($validator->passes()){
                    $hasPassed = true;
                  }
                  else {
                    return Redirect::to('upload')->withInput()->withErrors($validator);
                  }
                }
                //Save files to storage
                if($hasPassed){
                    $path = '/components/images/gallery/item_images/';
                    Storage::disk('images')->makeDirectory($item_id->id);
                    foreach ($files as $file) {
                        $filename = $file->getClientOriginalName();
                        // $extension = $file->getClientOriginalExtension();
                        $imageLink = $path.$item_id->id.'/'.$filename;
                        Storage::disk('images')->put($item_id->id.'/'.$filename,  File::get($file));
                        $item_image = New ItemImage;
                        $item_image->item_id = $item_id->id;
                        $item_image->link = $imageLink;
                        $item_image->save();
                    }
                }
                if($uploadcount == $file_count){
                  Session::flash('success', 'Upload successfully'); 
                  return Redirect::to('upload');
                } 
            }

            // dd('no files');
            return Redirect::back()->withFlashMessage('
                            Item is Successfully Added.
                    ');;
        }
        else{
            // dd(Input::get('id'));
            $item = Item::find(Input::get('id'));
            $item->name=Input::get('name');
            $item->description=Input::get('description');
            $item->model=Input::get('model');
            $item->price=Input::get('price');
            $item->effectivity_date=Input::get('effectivity_date');
            $item->unit=Input::get('unit');
            $item->type=Input::get('type');
            $item->save();
            return Redirect::back()
                ->withFlashMessage('
                            Item is Successfully updated.
                    ');
        }
    }

    // To Edit Items Request
    public function toEditItem(){
        if(Request::ajax()){
            $item = Item::find(Input::get('id'));
            return Response::json($item);
        }       
    }

    //Image Preview Function
    public function imagePreview(){
        if(Request::ajax()){
            $itemImage = ItemImage::where('item_id','=',Input::get('id'))->get();
            $links = $itemImage->lists('link');
            $data[] = '';
            foreach ($links as $link) {
                $data[] = array($link);
            }
            // dd($data);
            return Response::json($data);
        }
    }

    //Retrieve Item
    public function getItem(){
        if(Request::ajax()){
            $item = Item::find(Input::get('id'));
            return Response::json($item);
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
        $item = Item::find($id);
        $item->isActive = 0;
        $item->save();

        return Redirect::back()
            ->withFlashMessage('Item is Successfully deactivated.');
    }
}
