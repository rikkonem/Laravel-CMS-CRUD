@component('mail::message')
# Introduction

You are invited to our app.
Click button below to register yourself.

@component('mail::button', ['url' => $url])
Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
