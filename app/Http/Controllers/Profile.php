<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
     public function __construct()
        {
            $this->middleware('auth');
        }


        public function edit($id)
        {
            $user = User::where('id',$id)->first();
            return view('admin.profile.edit',compact('user'));
        }

        public function update(Request $request, $id)
        {
            //
            $this->validate($request,[
                'name' => ['required', 'string', 'max:255'],
                'password' => ['confirmed'],
                'avatar' => ['image','mimes:jpeg,png,jpg,gif,svg','max:5048']
            ]);


            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;


            if($request->filled('password'))
            {
                $user->password = Hash::make($request->password);
            }
            if($request->hasFile('avatar'))
            {
                //unlink current image
                if(Auth::user()->avatar != 'public/avatar.png')
                {
                    $old_image = 'storage/files/users/'.substr(Auth::user()->avatar,19);
                    if(file_exists($old_image))
                    {
                        unlink($old_image);
                    }
                }

                $user->avatar = $request->avatar->store('public/files/users');

            }

            $user->save();

            return redirect()->back()->with('success',"Your account updated successfully'");

        }
}
