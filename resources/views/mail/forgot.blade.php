<x-mail::message>

    {{ __('| 📧 📧 📧 📧') }}


    {{ __('Hello') }} {{ $user->name }} {{ __('!') }}


    {{ __('You are receiving this email because we received a password reset request for your account.') }}



@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
{{ __('Reset Password') }}
@endcomponent

    {{ __('This password reset link will expire in 60 minutes.') }}

    {{ __('If you did not request a password reset, no further action is required.') }}

    {{ __('Regards,') }}
    -{{ config('app.name') }}


    {{ __("Please do not reply as this is an automated email response.")  }}

</x-mail::message>

