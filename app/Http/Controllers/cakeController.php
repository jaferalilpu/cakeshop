<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\cakeCreateRequest;
use App\Http\Requests\cakeUpdateRequest;
use App\Models\cake;

class cakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCakes =cake::paginate(3);
        return view('cake.index',compact('allCakes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cake.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cakeCreateRequest $request)
    {
        $path = $request->image->store('public/cake');
        cake::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path
        ]);
        return redirect()->route('cake.index')->with('message', 'Cake Stored successfully!');
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
        $onerow = cake::find($id);
        return view('cake.edit',compact('onerow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cakeUpdateRequest $request, $id)
    {
        $onerow4Update = cake::find($id);
        if($request->has('image')){
            $path = $request->image->store('public/cake');

        }else{
            $path=$onerow4Update->image;
        }
        $onerow4Update->fill($request->input());
        $onerow4Update->name=$request->name;
        $onerow4Update->description=$request->description;
        $onerow4Update->price=$request->price;
        $onerow4Update->image=$path;
        $onerow4Update->save();
        return redirect()->route('cake.index')->with('message', 'Cake Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cake::find($id)->delete();
        return redirect()->route('cake.index')->with('message', 'Cake Deleted successfully!');
    }
}
