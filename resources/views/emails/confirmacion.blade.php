@component('mail::message')
# Ha llegado una nueva consulta

{{$correo}}

{{$asunto}}

{{$mensaje}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
