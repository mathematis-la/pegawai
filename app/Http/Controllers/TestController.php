<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){

    	// $data['nama']="Dwi Sulistyo Nugroho";
    	$data= array(
    		'nama'=>"Dwi Sulistyo Nugroho",
    		'matkul'=>[
    			"Nova","Forge","Vapor"
    		]
    	);

    	return view('welcome', $data);
    }

    public function cek_kode(Request $req){
        $tbl="tbl_pegawai";
        $id="id_karyawan";
        
        $thisYears=date("Y");
        $thisMonth=date("m");
        $thisNumber = $thisYears.$thisMonth;

        $rslt = DB::table('tbl_pegawai')->max('id_karyawan');
        $nourut = (int) substr($rslt, 6, 9);
        $cekTanggal = substr($rslt, 0, 6);
        $nourut++;

        

        if (strcmp($thisNumber, $cekTanggal) != 0) {
            $nourut=1;
        }

        
        $newID=$thisNumber.sprintf("%04s", $nourut);

        DB::table('tbl_pegawai')->insert([
         'id_karyawan' => $newID,
         'nama' => $req->txtNama,
         'alamat' =>$req->txtAlamat,
         'KTP' => $req->txtKTP,
         'status' => "1"
        ]);

        $hsl=$req->all();
        
        $count=count($req->asal);
        $count2=count($req->perusahaan);

        for ($i=0; $i<$count ; $i++) { 
             DB::table('tbl_pendidikan')->insert([
             'id' => null,
             'id_karyawan' => $newID,
             'sekolah_asal' =>$req->asal[$i],
             'jurusan' => $req->jurusan[$i],
             'tahun_masuk' => $req->thn_masuk[$i],
             'tahun_lulus' => $req->thn_lulus[$i]
            ]);
        }

        if ($count2==0||$count2=='') {
            echo json_encode($hsl);
        }else{

            for ($i=0; $i<$count2  ; $i++) { 
             DB::table('tbl_pengalaman')->insert([
             'id' => null,
             'id_karyawan' => $newID,
             'perusahaan' =>$req->perusahaan[$i],
             'jabatan' => $req->jabatan[$i],
             'tahun' => $req->tahun[$i],
             'keterangan' => $req->ket[$i]

            ]);

            echo json_encode($hsl);

        }
        }

        
    }

    public function tampilData(){
        $data= DB::table('tbl_pegawai')->where('status', '=', '1')->get();

        echo json_encode($data);
    }

    public function view($id){



        $data['pend']= DB::table('tbl_pegawai')
            ->join('tbl_pendidikan', 'tbl_pegawai.id_karyawan', '=', 'tbl_pendidikan.id_karyawan')
            ->select('tbl_pegawai.*', 'tbl_pendidikan.*')
            ->where('tbl_pegawai.id_karyawan', '=', $id)
            ->get();

        $data['pra']= DB::table('tbl_pegawai')
            ->join('tbl_pengalaman', 'tbl_pegawai.id_karyawan', '=', 'tbl_pengalaman.id_karyawan')
            ->select('tbl_pegawai.*', 'tbl_pengalaman.*')
            ->where('tbl_pegawai.id_karyawan', '=', $id)
            ->get();


        echo json_encode($data);
    }


    public function test_request(){
    	// $data['data'] = DB::table('test_table')->get();
    	// $data['data'] = DB::statement('select * from pegawai');

    	return view('pegawai/index');
    }


    public function formulir(){
    	return view('formulir');
    }

    public function proses(Request $request){
    	$nama = $request->input('nama');
    	$alamat = $request->input('alamat');

    	return "Nama :".$nama.", Alamat :".$alamat;
    }


    public function tambah(){
    	return view('pegawai/tambah');
    }

    public function store(Request $req){
    	// DB::table('test_table')->insert([
    	// 	'id' => $req->id,
    	// 	'nama' => $req->nama,
    	// 	'keterangan' =>$req->keterangan
    	// ]);

        

        $msg['success'] = $req->txtNama;

        echo json_encode($msg);
    	// return redirect('/pegawai');
    }

    public function edit($id){
    	// $data['data'] = DB::table('test_table')->where('id', $id)->get();

        $data['pend']= DB::table('tbl_pegawai')
            ->join('tbl_pendidikan', 'tbl_pegawai.id_karyawan', '=', 'tbl_pendidikan.id_karyawan')
            ->select('tbl_pegawai.*', 'tbl_pendidikan.*')
            ->where('tbl_pegawai.id_karyawan', '=', $id)
            ->get();

        $data['pra']= DB::table('tbl_pegawai')
            ->join('tbl_pengalaman', 'tbl_pegawai.id_karyawan', '=', 'tbl_pengalaman.id_karyawan')
            ->select('tbl_pegawai.*', 'tbl_pengalaman.*')
            ->where('tbl_pegawai.id_karyawan', '=', $id)
            ->get();


        echo json_encode($data);

    	// return view('pegawai/edit', $data);
    }	

    public function update(Request $req, $id){
    	

        $result=DB::table('tbl_pegawai')->where('id_karyawan',$id)->update([
         'nama' => $req->txtNamaEdit,
         'alamat' =>$req->txtAlamatEdit,
         'KTP' => $req->txtKTPEdit,
         'status' => "1"		 
		 ]);


		 $data=$req->all();

         $count=count($req->asal);
         $count2=count($req->perusahaan);

         for ($i=0; $i<$count ; $i++) { 
         $rslt_pend=DB::table('tbl_pendidikan')->where('id',$req->txtid1[$i])->update([
             'sekolah_asal' =>$req->asal[$i],
             'jurusan' => $req->jurusan[$i],
             'tahun_masuk' => $req->thn_masuk[$i],
             'tahun_lulus' => $req->thn_lulus[$i]
            ]);
        }

        for ($i=0; $i<$count2 ; $i++) { 
         $rslt_pend=DB::table('tbl_pengalaman')->where('id',$req->txtid2[$i])->update([
             'perusahaan' =>$req->perusahaan[$i],
             'jabatan' => $req->jabatan[$i],
             'tahun' => $req->tahun[$i],
             'keterangan' => $req->ket[$i]
            ]);
        }
         

         $msg['success'] = TRUE;
         
         echo json_encode($data);
		 // return redirect('/pegawai');
    }


    public function hapus($id){
    	$result=DB::table('tbl_pegawai')->where('id_karyawan',$id)->update([
         'status' => "0"         
         ]);

    	$msg['success'] = false;
         if ($result) {
            $msg['success'] = true;
        }
         echo json_encode($msg);
    }





    public function home(){
    	return view('home');
    }

    public function tentang(){
    	return view('tentang');
    }

    public function kontak(){
		return view('kontak');
    }
}
