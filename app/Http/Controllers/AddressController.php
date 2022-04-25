<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('address/index');

        $addresses = Address::latest()->paginate(5);
        return view('address.index', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return dd($request->all());

        request()->validate(
            ['name' => 'required',
             'postal' => 'required',
             'address' => 'required',
             'phone' => 'required',
             'email' => 'required',
             'todo' => 'required']
        );

        Address::create([
            'name'=>request('name'),
            'postal'=>request('postal'),
            'address'=>request('address'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'todo'=>request('todo')
        ]);

        return redirect()->back()->with('message', '住所録が追加されました。');
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
        $address = Address::find($id);
        return view('address.edit', ['address' => $address]);
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
        request()->validate(
            ['name' => 'required',
             'postal' => 'required',
             'address' => 'required',
             'phone' => 'required',
             'email' => 'required',
             'todo' => 'required']
        );
        
        $address = Address::find($id);
        $address->name = request('name');
        $address->save();
        return redirect('/address')->with('message', '住所録が編集されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect('/address')->with('message', '住所録が削除されました。');
    }

    public function find(Request $request)
    {
        return view('address.find',['input' => '']);
    }

    public function search(Request $request)
    {
        $address = Address::nameEqual($request->input)->first();
        $param = ['input' => $request->input, 'address' => $address];
        return view('address.find', $param);
    }
}
