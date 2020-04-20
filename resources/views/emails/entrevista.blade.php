@component('mail::message')
# Has sido contactado para hacer una entrevista de trabajo

Acuda a su perfil, agenda para tener los detalles de la misma.

@component('mail::button', ['url' => '/'])
Ir al portal de búsqueda de empleo
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
