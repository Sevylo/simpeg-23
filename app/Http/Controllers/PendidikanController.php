<?php

namespace App\Http\Controllers;
use App\Models\Pendidikan;
use App\Models\tb_pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $data = Pendidikan::where('id_pdk','LIKE','%' .$request->search.'%')
            ->orWhere('id_pgw','LIKE','%' .$request->search. '%')
            ->orWhere('t_pdk','LIKE','%' .$request->search. '%')
            ->orWhere('d_pdk','LIKE','%' .$request->search. '%')
            ->paginate(5);
        }else{
            $data = Pendidikan::with('pegawai')->latest()->paginate(5);
        }
        return view('pendidikan', compact ('data'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = tb_pegawai::all();
        return view('tambahpdk', compact('pegawai'));
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
            Pendidikan::create($requestData);

        return redirect('/pendidikan')-> with('success','Data Berhasil Ditambahkan');
        
        
      
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

    $data = Pendidikan::find($id);
    return view('editpdk',compact('data'));
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
        $data = Pendidikan::findorfail($id);
        $data -> update($request->all());

         return redirect('pendidikan')->with('success','Data Berhasil Diubah');
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
    DB::table('pendidikan')->where('id_pdk', $id)->delete();
    return redirect('/pendidikan');
}



    public function exportpdf3(){
   
        $data = pendidikan::all();
    view()->share('data', $data);
    $pdf = PDF::loadview('pendidikan-pdf');
    return $pdf->download('data.pdf');
     
    }
}
