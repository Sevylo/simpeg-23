<?php

namespace App\Http\Controllers;

use App\Models\tb_pegawai;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $data = Absensi::where('id_pgw','LIKE','%' .$request->search.'%')
            ->orWhere('nama','LIKE','%' .$request->search. '%')
            ->orWhere('status','LIKE','%' .$request->search. '%')
            ->orWhere('id_absen','LIKE','%' .$request->search. '%')

            ->paginate(5);
        }else{
            $data = Absensi::with('pegawai')->latest()->paginate(5);
        }
        return view('absensi', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = tb_pegawai::all();
        return view('tambahabsensi',compact('pegawai'));
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
            Absensi::create($requestData);

        return redirect('/absensi')-> with('success','Data Berhasil Ditambahkan');
        
        
      
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

    $data = Absensi::find($id);
    return view('editabsensi',compact('data'));
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
        $data = Absensi::findorfail($id);
        $data -> update($request->all());

         return redirect('absensi')->with('success','Data Berhasil Diubah');
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
    DB::table('absensi')->where('id_absen', $id)->delete();
    return redirect('/absensi');
}



    public function exportpdf4(){
   
        $data = Absensi::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('absensi-pdf');
    return $pdf->download('data1.pdf');
     
    }
}
