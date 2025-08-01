<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\Preset;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\PDF;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $data = Presensi::where('id_presensi','LIKE','%' .$request->search.'%')
            ->orWhere('id_pgw','LIKE','%' .$request->search. '%')
            ->orWhere('st_kehadiran','LIKE','%' .$request->search. '%')
            ->paginate(5);
        }else{
            $data = Presensi::with('pegawai')->latest()->paginate(5);
        }
        return view('presensi', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = tb_pegawai::all();
        return view('tambahpresensi',compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
            $requestData = $request->all();
            $wkt = array("wkt_telat"=> Carbon::now());
            Presensi::create($requestData);

        return redirect('/presensi')-> with('success','Data Berhasil Ditambahkan');
        
        
      
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

    $data = Presensi::find($id);
    return view('editpresensi',compact('data'));
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
        $data = Presensi::findorfail($id);
        $data -> update($request->all());

         return redirect('presensi')->with('success','Data Berhasil Diubah');
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
    DB::table('presensi')->where('id_presensi', $id)->delete();
    return redirect('/presensi');
}



    public function exportpdf7(){
   
        $data = Presensi::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('presensi-pdf');
    return $pdf->download('data.pdf');
     
    }
}
