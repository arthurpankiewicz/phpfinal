<?php namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function facebook()
    {
        return Socialite::with('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::with('facebook')->user();
        $token = $user->token;

        $user->getId();
        $user->getNicname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();

        echo $user['id'];

        return('/courses');

    }
}
