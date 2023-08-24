<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoretypesRequest;
use App\Http\Requests\UpdatetypesRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = $request->all();

        if(isset($datas['message'])){
            $message = $datas['message'];
        }else{
            $message = '';
        }

        $types = Type::all();

        return view('type.index', compact('types', 'message'));
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
     * @param  \App\Http\Requests\StoretypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $Type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $types
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetypesRequest  $request
     * @param  \App\Models\Type  $types
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetypesRequest $request, Type $types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $types)
    {
        //
    }
}
