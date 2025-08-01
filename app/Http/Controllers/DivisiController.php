<?php

namespace App\Http\Controllers;
use App\Models\Divisi;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $data = Divisi::where('id_divisi','LIKE','%' .$request->search.'%')
            ->orWhere('nm_divisi','LIKE','%' .$request->search. '%')
            ->paginate(5);
        }else{
            $data = Divisi::with('pegawai')->latest()->paginate(5);
        }
        return view('divisi', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = tb_pegawai::all();
        return view('tambahdvs',compact('pegawai'));
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
            Divisi::create($requestData);

        return redirect('/divisi')-> with('success','Data Berhasil Ditambahkan');
        
        
      
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
    $pegawai = tb_pegawai::all();
    $data = Divisi::find($id);
    return view('editdvs',compact('data','pegawai'));
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
        $data = Divisi::findorfail($id);
        $data -> update($request->all());

         return redirect('divisi')->with('success','Data Berhasil Diubah');
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
    DB::table('divisi')->where('id_divisi', $id)->delete();
    return redirect('/divisi');
}



    public function exportpdf5(){
   
        $data = Divisi::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('divisi-pdf');
    return $pdf->download('data.pdf');
     
    }
}
