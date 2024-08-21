@component('mail::message')
# {{ $plan_obras }}


Olá {{auth()->user()->name}}, sua obra foi criada em nosso sistema.

Data de início: {{ $data }}

@component('mail::button', ['url' => $url])
Clique aqui para ver a obra
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
