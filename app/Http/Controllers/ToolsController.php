<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tools;

/**
 * model block
 */
class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Tools::get();
        $title = 'List Data Alat';
        return view('pages.tools.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Tambah Data Alat';
        $data = (object)[
            'name'              => '',
            'type'              => 'create',
        ];
        return view('pages.tools.form', compact('title', 'data'));
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
        $request->validate([
            'name' => 'required',
        ]);

        try {
            Tools::create([
                'name' => $request->name,
            ]);
            return redirect('tools')->with('success', 'Berhasil menambah data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal menambah data!'.$th->getMessage());
        }
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
        $data = Tools::where('id', $id)->first();
        $title = 'Detail Data Alat';
        $data->type = 'detail';

        return view('pages.tools.form', compact('data', 'title'));
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
        $data = Tools::where('id', $id)->first();
        $title = 'Edit Data Alat';
        $data->type = 'edit';
        return view('pages.tools.form', compact('data', 'title'));
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
        $request->validate([
            'name' => 'required',
        ]);
        try {
            $data = ([
                'name' => $request->name,
            ]);

            Tools::where('id', $id)->update($data);
            return redirect('tools')->with('success', 'Berhasil mengubah data!');
        } catch (\Throwable $th) {
            return back()->with('failed', 'Gagal mengubah data!'.$th->getMessage());
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
        Tools::find($id)->delete();
        return redirect('tools')->with('success', 'Berhasil mengubah data!');
    }
}
