<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;



class Profile extends Model
{
    protected $fillable = ['fname', 'lname', 'body', 'avatar'];


    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function LoadAvatar($request,$profile)
    {
        //Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $profile->avatar = $filename;
        }
    }
    public static function  ValidateInputs($request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'body' => 'required',
        ], [
            'fname.required' => ' First Name is required',
            'lname.required' => ' Last Name is required',
            'body.required' => ' Body is required',
        ]);
    }
}
