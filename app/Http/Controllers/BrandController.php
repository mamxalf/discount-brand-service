<?php

namespace App\Http\Controllers;

use Validator;
use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Brand::with('media')->get();

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
        //
        $validator = Validator::make($request->all(),[
           'title' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Ada kolom terlewat!', 401);
        } else {
            $data = Brand::create([
               'title' =>  $request->get('title')
            ]);

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
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
