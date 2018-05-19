<?php
namespace App\Http\ViewComposers;
use App\Http\Repository\ProfileRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
class ProfileComposer
{
    public $profile;
    /**
     * Create a profile composer.
     *
     *  @param ProfileRepository $profileRepository
     *
     * @return void
     */
    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profile = $profileRepository->getProfile();
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('profile', $this->profile);
    }
}