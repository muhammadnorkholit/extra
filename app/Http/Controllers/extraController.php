<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Extrakulikuler;
class extraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('extrakulikulers')
        ->join('categories', 'extrakulikulers.category_id', '=', 'categories.id')
        ->select('categories.nama_category', 'extrakulikulers.nama_extra', 'extrakulikulers.penanggung_jawab', 'extrakulikulers.id')
        ->get();
        $c = DB::table("categories")->get();

return view('dashboard.extra', [
"no" => $no = 1,
"extra" => $category,
"category"=>$c
]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);
           $name = $request->file('file')->getClientOriginalName();
        //    $path = $request->file('file')->store('public/img');

           $request->file->move(public_path('img'),$name);
           
           
 
        
           Extrakulikuler::create([
            "nama_extra"=>$request->nama_extra,
            "deskripsi"=>$request->desc,
            "foto"=>$name,
            "penanggung_jawab"=>$request->pg,
            "category_id"=>$request->category
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.showextra', [
            "data" => Extrakulikuler::where('id', '=', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
