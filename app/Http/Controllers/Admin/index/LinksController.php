<?php

namespace App\Http\Controllers\Admin\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\index\Links;
use App\Models\share\SortProcess;
use Lang;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $links = Links::with('material')->orderBy('sort')->get();

        return view('admin.index.link.index',compact('links'));
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
        $input = $request->only('material_id');
        $input['status'] = 1;
        //update data
        $link = Links::updateData($input,$id);

        if($link){
            return redirect()->route('index.link.index')
                ->with('success',Lang::get('admin.Edit Success'));
        }else{
            return redirect()->route('index.link.index')
                ->with('error',Lang::get('admin.Edit Fail'));
        }
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
        //軟刪除
        $input['status'] = 0;
        $result = Links::updateData($input,$id);

        if($result){
            return redirect()->route('index.link.index')
                ->with('success',Lang::get('admin.Go Off Success'));
        }else{
            return redirect()->route('index.link.index')
                ->with('error',Lang::get('admin.Go Off Fail'));
        }
    }

    public function up(Request $request){
        $id = $request->code;
        $result = SortProcess::up(Links::class,$id);

        if($result){
            return redirect()->route('index.link.index')
                ->with('success',Lang::get('admin.Sort Success'));
        }else{
            return redirect()->route('index.link.index')
                ->with('error',Lang::get('admin.Sort Fail'));
        }

    }
    
    public function down(Request $request){
        $id = $request->code;
        $last = "8";//下限
        $result = SortProcess::down(Links::class,$id,$last);

        if($result){
            return redirect()->route('index.link.index')
                ->with('success',Lang::get('admin.Sort Success'));
        }else{
            return redirect()->route('index.link.index')
                ->with('error',Lang::get('admin.Sort Fail'));
        }

    }
}
