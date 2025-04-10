@component('mail::message')
# User Deleted

Hello Admin,

The following user has been deleted:

- **Name:** {{ $user->name }}
- **Email:** {{ $user->email }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
