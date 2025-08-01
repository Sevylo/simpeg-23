<?php

namespace App\Http\Controllers;
use App\Models\Kantor;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class KantorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $data = Kantor::where('id_kantor','LIKE','%' .$request->search.'%')
            ->orWhere('nm_wilayah','LIKE','%' .$request->search. '%')
            ->paginate(5);
        }else{
            $data = Kantor::with('pegawai')->latest()->paginate(5);
        }
        return view('kantor', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = tb_pegawai::all();
        return view('tambahkantor',compact('pegawai'));
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
            Kantor::create($requestData);

        return redirect('/kantor')-> with('success','Data Berhasil Ditambahkan');
        
        
      
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

    $data = Kantor::find($id);
    return view('editkantor',compact('data'));
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
        $data = Kantor::findorfail($id);
        $data -> update($request->all());

         return redirect('kantor')->with('success','Data Berhasil Diubah');
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
    DB::table('kantor')->where('id_kantor', $id)->delete();
    return redirect('/kantor');
}



    public function exportpdf6(){
   
        $data = Kantor::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('kantor-pdf');
    return $pdf->download('data.pdf');
     
    }
}
