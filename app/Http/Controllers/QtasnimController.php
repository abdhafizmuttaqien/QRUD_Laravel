<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qtasnim_Tabel;

class QtasnimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Qtasnim_Tabel::all();
        return view('home_page', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Qtasnim_Tabel::create($request->all());

        return redirect('/');
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
        
        $data = Qtasnim_Tabel::find($id);

        // $result = [
		// 	'data' => $data,
		// 	'status' => true,
		// 	'status_code' => 200
		// ];

		// header('Content-Type: application/json');
		// echo json_encode($result);
        //return json_encode(array('data'=>$data));
        return view('edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Qtasnim_Tabel::where('id', $id)
       ->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'jumlah_terjual' => $request->jumlah_terjual,
            'jenis_barang' => $request->jenis_barang
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Qtasnim_Tabel::where('id', $id)->delete();
        return redirect('/');
    }
}
