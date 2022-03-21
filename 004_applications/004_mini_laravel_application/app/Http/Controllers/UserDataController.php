<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $userData = UserData::latest()->paginate(5);

       return view('index', compact('userData'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        UserData::create($request->all());

        $userData = UserData::latest()->paginate(5);

        return view('index', compact('userData'))
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('sucess', 'User updated sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userData = UserData::find($id);

        return view('show', compact('userData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData = UserData::find($id);
        return view('edit', compact('userData', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
     
    public function update($id, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);


        $userData = UserData::find($id);
        $userData->name = request('name');
        $userData->email = request('email');
        $userData->save();

        
        $userData = UserData::latest()->paginate(5);
        return view('index', compact('userData'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserData::find($id)->delete();

        $userData = UserData::latest()->paginate(5);
        return view('index', compact('userData'))
        ->with('i', (request()->input('page', 1) - 1) * 5)
        ->with('sucess', 'User deleted sucessfully!');

    }
}