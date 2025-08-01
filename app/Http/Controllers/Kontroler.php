<?php

namespace App\Http\Controllers;

use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class Kontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPegawai(Request $request)
    {

        if($request->has('search')){
            $data = tb_pegawai::where('id_pgw','LIKE','%' .$request->search.'%')
            ->orWhere('nama','LIKE','%' .$request->search. '%')
            ->orWhere('alamat','LIKE','%' .$request->search. '%')
            ->orWhere('tmpt_lahir','LIKE','%' .$request->search. '%')
            ->orWhere('tgl_lahir','LIKE','%' .$request->search. '%')
            ->orWhere('kelamin','LIKE','%' .$request->search. '%')
            ->orWhere('agama','LIKE','%' .$request->search. '%')
            ->orWhere('nope','LIKE','%' .$request->search. '%')
            ->orWhere('email','LIKE','%' .$request->search. '%')
            ->orWhere('nm_divisi','LIKE','%' .$request->search. '%')
            ->orWhere('id_kantor','LIKE','%' .$request->search. '%')
            ->paginate(5);
        }else{
            $data = tb_pegawai::with('fprint','kantor','divisi')->latest()->paginate(5);
        }
        return view('pegawai', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahpgw');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
           
        $data = tb_pegawai::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect('/pegawai')-> with('success','Data Berhasil Ditambahkan');
        
        
      
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

    $data = tb_pegawai::find($id);
    return view('editpgw',compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    
    public function update(Request $request,$id)
    {
        $data = tb_pegawai::findorfail($id);
        $data -> update($request->all());

         return redirect('pegawai')->with('success','Data Berhasil Diubah');
    }

// }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
   
     public function destroy(Request $request , $id)
{
    DB::table('tb_pegawai')->where('id_pgw', $id)->delete();
    return redirect('/pegawai');
}

    public function exportpdf(){
   
        $data = tb_pegawai::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('datapegawai-pdf');
    return $pdf->download('data.pdf');
     
    }
}
