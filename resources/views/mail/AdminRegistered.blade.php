<x-mail::message>

    {{ __('| 📧 📧 📧 📧') }}


    {{ __('Hi') }} {{ $user->name }}


    {{ __('Your account created successfully.') }}


    {{ __('Your account credentials are:') }}

@component('mail::table')
| **Email** | **Password** | **Link** |
| ---------------------------------------------- |:---------------------:| -----------------------:|
| {{ $user->email }} | {{ $password }} | {{ env('APP_URL') }} |
@endcomponent


    {{ __('Thanks') }}


    -{{ config('app.name') }}


    {{ __("Please do not reply as this is an automated email response.")  }}

</x-mail::message>

