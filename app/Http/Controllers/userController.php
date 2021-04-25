<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index()
    {
        $users = UserModel::latest()->get();
        //$users = DB::table('UserModels')->get();
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

try{
        UserModel::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'remarks' => $request->remarks,
        ]);

        return redirect()->back()->with('success', 'Successfully Inserted');
}catch(\Exception $e) {
    throw new Exception($e->getMessage());
}
    }

    public function edit($id)
    {
        $users_data = UserModel::findorFail($id);
        return view('edit', compact('users_data'));
    }


    public function update(Request $request, $id)
    {
        UserModel::findorFail($id)->update([
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
        UserModel::findorFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Deleted');
    }
}
