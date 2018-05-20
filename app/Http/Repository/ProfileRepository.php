<?php
namespace App\Http\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Profile;
/**
 * Profile Repository class
 */
class ProfileRepository
{
    /* Get profile object.
     *
     */
    public function getProfile()
    {
        //get the logged in user
        $user = Auth::user();
        //get the profile instance for that user
        $profile = $user->profile;
        if ($profile == null)
            $profile = new Profile();
        return $profile;
    }
}