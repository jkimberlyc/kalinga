<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    // protected function authenticate($request, array $guards)
    // {
    //     parent::authenticate($request, $guards);

    //     // Got here? good! it means the user is session authenticated. now we should check if it authorize

    //     if (auth()->user()->role == "Doctor") {
    //         $doc = Doctor::find(auth()->user()->id);
    //         if (!$doc->isApproved) {
    //             auth()->logout();
    //             $this->unauthenticated($request, $guards);
    //         }
    //     }
    // }
}
