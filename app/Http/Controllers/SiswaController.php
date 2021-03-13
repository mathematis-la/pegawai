<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    

	public function index($id=null){

		$data['data']= \App\Siswa::all();

		return view('siswa.index');

		
	}

	public function get(){
		$data= \App\Siswa::all();

		echo json_encode($data);
	}

	public function tambah(Request $req){
		// \App\Siswa::create($req->all());
		date_default_timezone_set('Asia/Jakarta');
		$dateNow = date("Y-m-d H:i:s");

		$result = DB::table('siswa')->insert([
    		'nama_depan' => $req->namaDepan,
    		'nama_belakang' =>$req->namaBelakang,
    		'jenis_kelamin' =>$req->jenisKelamin,
    		'agama' =>$req->agama,
    		'alamat' =>$req->alamat,
    		'created_at'=>$dateNow,
    		'updated_at'=>$dateNow
    	]);

    	$msg['success'] = FALSE;
    	$msg['type'] = 'Add';
    	if ($result) {
			$msg['success'] = TRUE;
		}

		echo json_encode($msg);
	}

	public function edit($id){
		$data= DB::table('siswa')->where('id', $id)->get();
		echo json_encode($data);	
	}


	public function update(Request $req, $id){
		date_default_timezone_set('Asia/Jakarta');
		$dateNow = date("Y-m-d H:i:s");

		$result= DB::table('siswa')->where('id', $id)->update([
		 	'nama_depan' => $req->namaDepan,
    		'nama_belakang' =>$req->namaBelakang,
    		'jenis_kelamin' =>$req->jenisKelamin,
    		'agama' =>$req->agama,
    		'alamat' =>$req->alamat,
    		'updated_at'=>$dateNow	 
		 ]);

		$msg['success'] = false;
		$msg['type'] = 'Update';
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
