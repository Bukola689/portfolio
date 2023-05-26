@component('mail::message')
# Introduction

Hello {{ $contact->name }} You Contact Has Been Received By The Admin !!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
