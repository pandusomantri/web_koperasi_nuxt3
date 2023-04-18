<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Model_Saber;
use App\Http\Resources\SaberResource;
use Illuminate\Support\Facades\Validator;

class SaberController extends Controller
{
    public function index()
    {
        //get posts
        $list = Model_Saber::latest()->paginate(5);

        //return collection of posts as a resource
        return new SaberResource(true, 'List Data Posts', $list);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'    => 'required',
            'kelas'   => 'required',
            'no_hp'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $daftar = Model_Saber::create([
            'nama'     => $request->nama,
            'kelas'     => $request->kelas,
            'no_hp'   => $request->no_hp,
        ]);

        //return response
        return new SaberResource(true, 'Data Siswa Berhasil Ditambahkan!', $daftar);
    }

    public function show($id)
    {
        $data = Model_Saber::find($id);
        //return single post as a resource
        return new SaberResource(true, 'Data Ditemukan!', $data);
    }

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'    => 'required',
            'kelas'   => 'required',
            'no_hp'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post = Model_Saber::find($id);
        //update post 
        $post->update([
            'nama'    => $request->nama,
            'kelas'   => $request->kelas,
            'no_hp'   => $request->no_hp,
        ]);
        

        //return response
        return new SaberResource(true, 'Data Berhasil Diubah!', $post);
    }

    public function destroy($id)
    {

        $post = Model_Saber::find($id);
        //delete post
        $post->delete();

        //return response
        return new SaberResource(true, 'Data Berhasil Dihapus!', null);
    }
}
