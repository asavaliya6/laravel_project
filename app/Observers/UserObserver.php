<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserDeletedMail;

class UserObserver
{

    public function created(User $user): void
    {
        //
    }

    public function updated(User $user): void
    {
        //
    }

    public function deleted(User $user): void
    {
        Mail::to('aditisavaliya60@gmail.com')->send(new UserDeletedMail($user));
    }

    public function restored(User $user): void
    {
        //
    }

    public function forceDeleted(User $user): void
    {
        //
    }
}
