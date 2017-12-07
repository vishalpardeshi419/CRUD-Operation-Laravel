<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CRUD;
use Datatable;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cruds = CRUD::all();
        return view('CRUD')
             ->with('data' , $Cruds);       
    }

    public function getDatatable()
    {
        return Datatable::collection(CRUD::all(['id','name','email']))
        ->showColumns('id', 'name','email')
        ->addColumn('action',function($model){
            return '<a class="btn btn-danger" href="'.url('/deleteuser').'/'.$model->id.'">delete</a>';
        })
        ->searchColumns(['id','name','email'])
        ->orderColumns('id','name')
        ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        CRUD::forceCreate($request->all());
        return redirect()->back();
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
       Item::find($id)->update($request->all()); 
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CRUD::destroy($id);
        return redirect()->route('delete.index')
                         ->with('success','Member deleted successfully');
    }
}
