<?php

namespace App\Http\Controllers;

use App\Models\DataRumahSakit;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DataRumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.datarumahsakit.index',[
            'datarumahsakit' => DataRumahSakit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.datarumahsakit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rumah_sakit'=>'required',
            'alamat'=>'required',
            'email'=> 'required',
            'telepon'=> 'required',
        ]);

        DataRumahSakit::Create($validatedData);
        
        return redirect('/dashboard')->with('success','New post hast been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataRumahSakit  $dataRumahSakit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('dashboard.datarumahsakit.show',[
            'datarumahsakit' => DataRumahSakit::find($request['tes'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataRumahSakit  $dataRumahSakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
     
        return view('dashboard.datarumahsakit.edit',[
            'datarumahsakit' => DataRumahSakit::find($request['tes']),
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataRumahSakit  $dataRumahSakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataRumahSakit $dataRumahSakit)
    {
        $rules =[
            'nama_rumah_sakit'=>'required',
            'alamat'=>'required',
            'email'=> 'required',
            'telepon'=> 'required',
        ];

        $validatedData = $request->validate($rules);



        DataRumahSakit::where('id',$request['tes'])
            ->update($validatedData);
        
        return redirect('/dashboard')->with('success','data hast been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataRumahSakit  $dataRumahSakit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DataRumahSakit::find($id)->delete($id);
  
        return redirect('/dashboard')->with('success','data sudah dihapus!');
    }
}
