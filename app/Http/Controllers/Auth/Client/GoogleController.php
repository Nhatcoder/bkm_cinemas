<?php

namespace App\Http\Controllers\Auth\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $avatarUrl = $user->avatar;
            $imagePath = null;

            if (!empty($avatarUrl)) {
                $avatarUrl = str_replace('http://', 'https://', $avatarUrl);
                $filename = uniqid() . '.jpg';

                $imageContents = file_get_contents($avatarUrl);

                Storage::put('public/auth/' . $filename, $imageContents);
                $imagePath = '/storage/auth/' . $filename;
            }

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                
                return redirect()->route('home');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'google_id' => $user->id,
                    'image' => $imagePath,
                    'password' => Hash::make(uniqid()),
                    'is_terms_accepted' => 1,
                    'is_subscribed_promotions' => 0,
                ]);

                Auth::login($newUser);

                return redirect()->route('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
