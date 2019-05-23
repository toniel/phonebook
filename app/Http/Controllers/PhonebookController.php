<?php

namespace App\Http\Controllers;

use App\Phonebook;
use Illuminate\Http\Request;
use App\Http\Requests\PhonebookRequest;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return View('phonebook');
    }

    public function getData()
    {
        # code...
        return Phonebook::orderBy('name')->get();
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
    public function store(PhonebookRequest $request,Phonebook $phonebook)
    {
        //
        // return $request->list['name'];
        $phonebook->name = $request->name;
        $phonebook->email = $request->email;
        $phonebook->phone = $request->phone;
        $phonebook->save();
        return $phonebook->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function show(Phonebook $phonebook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Phonebook $phonebook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function update(PhonebookRequest $request, Phonebook $phonebook)
    {
        //
        $phonebook = Phonebook::findOrfail($request->id);
        $phonebook->name = $request->name;
        $phonebook->email = $request->email;
        $phonebook->phone = $request->phone;
        $phonebook->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phonebook  $phonebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phonebook $phonebook)
    {
        //
        Phonebook::destroy($phonebook->id);

    }
}
