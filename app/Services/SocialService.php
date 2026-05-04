<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{
  public function loginAndGetRedirectUrl(SocialUser $socialUser): string
  {
    $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

    if ($user === null) {
      return route('register');
    }

    $user->name = $socialUser->getName(); // may be error
    $user->email = $socialUser->getEmail();
    $user->password = bcrypt(str()->random(16));

    //Auth::login($user);

    // Auth::loginUsingId($user->id);

    // return redirect('/home');

    //'password' => bcrypt((str_random(8)))

    if ($user->save()) {
      Auth::loginUsingId($user->id);

      return route('login');
    }

    throw new \Exception("Did not save user");
  }
}
