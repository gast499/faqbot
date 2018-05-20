<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


   public function profile() {
        $profile = new Profile();
        return view ('profile',['profile' => $profile]);

   }

   /*************** Show Main Page of profile feature************/
    public function create()
    {
        $profile = new Profile();
        $edit = FALSE;
        return view('profileForm', ['profile' => $profile,'edit' => $edit  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input =Profile::ValidateInputs($request);

        $input = request()->all();

        $profile = new Profile($input);
//        $profile->LoadAvatar($request,$profile);
        $profile->user()->associate(Auth::user());
        $profile->save();

        return redirect()->route('profile')->with('message', 'Profile Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $profile = $user->profile;
        return view('profile')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($user, $profile)
    {
        $user = User::find($user);
        $profile = $user->profile;
        $edit = TRUE;

        return view('profileForm', ['profile' => $profile, 'edit' => $edit ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user, $profile)
    {
        $input =Profile::ValidateInputs($request);

        $profile = Profile::find($profile);
        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->body = $request->body;
//        $profile->LoadAvatar($request,$profile);
        $profile->save();

        return redirect()->route('home')->with('message', 'Profile Created');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user,$profile)
    {
        //Find the corresponding user
        $user = User::find($user);
        //Get the user profile
        $profile = $user->profile;
        $profile->delete();
        return redirect()->route('home')->with('message', 'Profile Deleted Successfully!');
    }
}
