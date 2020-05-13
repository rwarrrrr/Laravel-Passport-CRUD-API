<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
    	
    	$data = Pengaduan::all();

    	return response()->json([
    		'success' => true,
    		'data' => $data,
    		'message' => 'data berhasil ditampilkan'
    	],200);

    }

    public function store(Request $request)
    {
    	
    	$validator = Validator::make($request->all(),[
    		'isi_laporan' => 'required',
    		'foto' => 'required'
    	]);

    	if ($validator->fails()) {
    		return response()->json([
    			'error' => false,
    			'message' => $validator->errors()
    		],404);
    	}

    	$pengaduan = new Pengaduan;
    	$pengaduan->isi_laporan = $request->isi_laporan;
    	$pengaduan->foto = $request->foto;

    	$status = $pengaduan->save();

    	$data = $pengaduan->toArray();

    	return response()->json([
    		'success' => true,
    		'data' => $data,
    		'message' => 'berhasil tambah data'
    	],200);	

    }


    public function update(Request $request,$id)
    {
    	
    	$validator = Validator::make($request->all(),[
    		'isi_laporan' => 'required',
    		'foto' => 'required'
    	]);

    	if ($validator->fails()) {
    		return response()->json([
    			'error' => false,
    			'message' => $validator->errors()
    		],404);
    	}

    	$pengaduan = Pengaduan::find($id);
    	$pengaduan->isi_laporan = $request->isi_laporan;
    	$pengaduan->foto = $request->foto;

    	$status = $pengaduan->update();

    	$data = $pengaduan->toArray();

    	return response()->json([
    		'success' => true,
    		'data' => $data,
    		'message' => 'berhasil edit data'
    	],200);	

    }


    public function delete($id)
    {
    	

    	$pengaduan = Pengaduan::find($id);

    	$status = $pengaduan->delete();

    	if ($status) {
    		return response()->json([
	    		'success' => true,
	    		'message' => 'berhasil hapus data'
	    	],200);		
    	}else{
    		return response()->json([
	    		'error' => true,
	    		'message' => 'gagal hapus data'
	    	],400);
    	}

    }


}
