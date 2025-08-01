<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Fprint;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class FprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $data = Fprint::where('nama','LIKE','%' .$request->search. '%')
            ->orWhere('id_fprint','LIKE','%' .$request->search. '%')
            ->orWhere('id_kantor','LIKE','%' .$request->search. '%')
            ->orWhere('id_pgw','LIKE','%' .$request->search. '%')
            ->paginate(5);
        }else{
            $data = Fprint::with('pegawai')->latest()->paginate(5);
        }
        return view('fprint', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = tb_pegawai::all(); 
        return view('tambahfprint', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {

        $data = Fprint::create($request->all());

        if($request->hasFile('scan_1')){
            $request->file('scan_1')->move('scan1/', $request->file('scan_1')->getClientOriginalName());
            $data->scan_1 = $request->file('scan_1')->getClientOriginalName();
            $data->save();

        if($request->hasFile('scan_2')){
                $request->file('scan_2')->move('scan2/', $request->file('scan_2')->getClientOriginalName());
                $data->scan_2 = $request->file('scan_2')->getClientOriginalName();
                $data->save();
            

        return redirect('/fprint')-> with('success','Data Berhasil Ditambahkan');
        
        
        }
    }
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

    $data = Fprint::find($id);
    return view('editfprint',compact('data'));
    // dd($data);    


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
        $data = Fprint::findorfail($id);
        $data -> update($request->all());

         return redirect('fprint')->with('success','Data Berhasil Diubah');
    }

// }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
   
     public function destroy($id)
{
    DB::table('fprint')->where('id_fprint', $id)->delete();
    return redirect('/fprint');
}



    public function exportpdf1(){
   
        $data = Fprint::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('fprint-pdf');
    return $pdf->download('data.pdf');
     
    }
}
