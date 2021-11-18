@component('mail::message')
# Introduction

Seu código é
{{ $code }}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
