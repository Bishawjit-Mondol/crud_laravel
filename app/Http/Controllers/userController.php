<?php

namespace App\Http\Controllers;

use App\Models\user_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index()
    {
        $users = user_model::latest()->get();
        //$users = DB::table('user_models')->get();
        return view('user', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'occupation' => 'required',
            'remarks' => 'required',
        ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'phone.required' => 'Please enter your phone',
            'occupation.required' => 'Please enter your occupation',
            'remarks.required' => 'Please enter your comment',
        ]);


        user_model::insert([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'remarks' => $request->remarks,
        ]);

        return redirect()->back()->with('success', 'Successfully Inserted');
    }

    public function edit($id)
    {
        $users_data = user_model::findorFail($id);
        return view('edit', compact('users_data'));
    }


    public function update(Request $request, $id)
    {
        user_model::findorFail($id)->update([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'remarks' => $request->remarks,
        ]);

        return redirect()->to('/crud')->with('update', 'Successfully Updated');
    }

    public function delete($id)
    {
        user_model::findorFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Deleted');
    }
}
