
@component('mail::message')

# Hi {{$data['name']}},

Forgot your password?
We received request to reset the password of your account.


@component('mail::button', ['url' => $data['url']])
Reset Password
@endcomponent

if you did not request for the password reset. please report it to your system admin


Have a great day!

Thanks,<br>
{{ config('app.name') }}
@endcomponent

