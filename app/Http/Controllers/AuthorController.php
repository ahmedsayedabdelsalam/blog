<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author');
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
    public function author(User $user) {
        return view('author', compact('user'));
    }

    public function profilePic(Request $request, $id) {
        $this->validate($request, [
    
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
        ]);
    
    
        $image = $request->file('image');
    
        $filename = time().'.'.$image->getClientOriginalExtension();
    
        $destinationPath = public_path('/storage/user_images');
    
        $image->move($destinationPath, $filename);
    
        $user = User::find($id);
        $user->image = $filename;
        $user->save();
    
    
        return back()->with('success','Image Upload successful');
    
    }
}
