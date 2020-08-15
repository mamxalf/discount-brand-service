<?php

namespace App\Http\Controllers;

use Validator;
use App\BrandMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = BrandMedia::with('brand')->get();

        if ( $data ) {
            return ResponseFormatter::sucess($data, 'Data Brands berhasil diambil!');
        } else {
            return ResponseFormatter::error(null, 'Data Brand tidak ada!', 404);
        }
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
        $validator = Validator::make($request->all(),[
            'id_brand' => 'required|integer',
            'logo' => 'required|file'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Ada kolom terlewat!', 401);
        } else {
            $data = new BrandMedia();
            $data->id_brand = $request->get('id_brand');
            if($request->file('logo')){
                $file = $request->file('logo')->store('logo', 'public');
                $data->logo = $file;
            }
            $data->save();

            if ($data) {
                return ResponseFormatter::sucess($data, "Data berhasil ditambahkan!");
            } else {
                return ResponseFormatter::error($validator->errors(), 'Ada kolom terlewat!', 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandMedia  $brandMedia
     * @return \Illuminate\Http\Response
     */
    public function show(BrandMedia $brandMedia, $brand_medium)
    {
        //
        $data = BrandMedia::with('brand')->find($brand_medium);

        if ( $data ) {
            return ResponseFormatter::sucess($data, 'Data Brands berhasil diambil!');
        } else {
            return ResponseFormatter::error(null, 'Data Brand tidak ada!', 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandMedia  $brandMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandMedia $brandMedia)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandMedia  $brandMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandMedia $brandMedia, $brand_medium)
    {
        //
//        $validator = Validator::make($request->all(),[
//            'id_brand' => 'required|integer',
//            'logo' => 'required|file'
//        ]);
//
//        if ($validator->fails()) {
//            return ResponseFormatter::error($validator->errors(), 'Ada kolom terlewat!', 401);
//        } else {
//            $data = BrandMedia::find($brand_medium)->first();
//            $data->id_brand = $request->input('id_brand');
//            if($request->file('logo')){
//                if($data->logo && file_exists(storage_path('app/public/' . $data->logo))){
//                    \Storage::delete('public/'.$data->logo);
//                }
//
//                $file = $request->file('logo')->store('logo', 'public');
//                $data->logo = $file;
//            }
//            $data->save();
//
//            if ($data) {
//                return ResponseFormatter::sucess($data, "Data berhasil ditambahkan!");
//            } else {
//                return ResponseFormatter::error($validator->errors(), 'Ada kolom terlewat!', 400);
//            }
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandMedia  $brandMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandMedia $brandMedia, $brand_medium)
    {
        $file = BrandMedia::with('brand')->find($brand_medium);
        Storage::delete('public/'.$file->logo);

//        return ResponseFormatter::sucess($file, "Data berhasil dihapus!");

        $data = BrandMedia::findOrFail($brand_medium);
        $data->delete();

        if ($data) {
            return ResponseFormatter::sucess($data, "Data berhasil dihapus!");
        } else {
            return ResponseFormatter::error($validator->errors(), 'Error Gan!', 400);
        }
    }
}
