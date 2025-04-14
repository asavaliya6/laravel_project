<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserDeletedMail;
use App\Jobs\SendUserDeletedMailJob;

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
        $userData = [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
        ];

        SendUserDeletedMailJob::dispatch($userData);
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
