@component('mail::message')
# Introdução

Corpo da mensagem

@component('mail::button', ['url' => ''])
Botão
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
