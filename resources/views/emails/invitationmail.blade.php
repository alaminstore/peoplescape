@component('mail::message')
# Invatation
{{$emailbody}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
