<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\Datarumahsakit;
use Illuminate\Http\Request;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.datapasien.index',[
            'datapasien' => DataPasien::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.datapasien.create',[
            'datapasien' => DataRumahSakit::all()
        ]);
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
            'nama_pasien'=>'required',
            'alamat'=>'required',
            'telepon'=> 'required',
            'id_rumah_sakit'=> 'required',
        ]);

        DataPasien::Create($validatedData);
        
        return redirect('/datapasien')->with('success','New post hast been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function show(DataPasien $dataPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
     
        return view('dashboard.datapasien.edit',[
            'datapasiens' => DataRumahSakit::all(),
            'datapasien' => DataPasien::find($request['tes']),
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPasien $dataPasien)
    {
        $rules =[
            'nama_pasien'=>'required',
            'alamat'=>'required',
            'telepon'=> 'required',
            'id_rumah_sakit'=> 'required',
        ];

        $validatedData = $request->validate($rules);



        DataPasien::where('id',$request['tes'])
            ->update($validatedData);
        
        return redirect('/datapasien')->with('success','data hast been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DataPasien::find($id)->delete($id);
  
        return redirect('/datapasien')->with('success','data sudah dihapus!');
    }
}
