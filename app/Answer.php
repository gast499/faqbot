<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function GetUserName(int $userID)
    {
        $profile = Profile::query()
            ->where('user_id','=',$userID)
            ->get();
        if($profile->count()!=0)
            $uname = $profile[0]->fname.' '.$profile[0]->lname;
        else
            $uname = 'Profile not yet created for this user.';
        return $uname;
    }
    public function GetUserEmail(int $userID)
    {
        $user = User::find($userID);
        return $user->email;
    }
}
