@component('mail::message')
# {{ $atividade }}


Olá {{auth()->user()->name}}, seu serviço foi criado em nosso sistema.

Data de início: {{ $data }}

Atividade: {{ $atividade }}

Responsável: {{ $responsavel }}

@component('mail::button', ['url' => $url])
Clique aqui para ver o serviço
@endcomponent

Atenciosamente,<br>
{{ config('app.name') }}
@endcomponent
