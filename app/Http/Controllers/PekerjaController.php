<?php

namespace App\Http\Controllers;
use App\Models\Pekerja;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class PekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $data = Pekerja::where('id_pkj','LIKE','%' .$request->search.'%')
            ->orWhere('nama_pkj','LIKE','%' .$request->search. '%')
            ->orWhere('id_pgw','LIKE','%' .$request->search. '%')
            ->orWhere('det_pkj','LIKE','%' .$request->search. '%')
            ->paginate(5);
        }else{
            $data = Pekerja::with('pegawai')->latest()->paginate(5);
        }
        return view('pekerja', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = tb_pegawai::all();
        return view('tambahpkj', compact('pegawai'));
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
            Pekerja::create($requestData);

        return redirect('/pekerja')-> with('success','Data Berhasil Ditambahkan');
        
        
      
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

    $data = Pekerja::find($id);
    return view('editpkj',compact('data'));
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
        $data = Pekerja::findorfail($id);
        $data -> update($request->all());

         return redirect('pekerja')->with('success','Data Berhasil Diubah');
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
    DB::table('p_kerja')->where('id_pkj', $id)->delete();
    return redirect('/pekerja');
}



    public function exportpdf2(){
   
        $data = Pekerja::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('pekerja-pdf');
    return $pdf->download('data.pdf');
     
    }
}
