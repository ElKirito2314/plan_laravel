<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\plan_servicos;

class NovoServicoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $atividade;
    public $responsavel;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plan_servicos $plan_servicos)
    {
        $this->data = date('d/m/Y', strtotime($plan_servicos->data_inicio));
        $this->atividade = $plan_servicos->atividade;
        $this->responsavel = $plan_servicos->plan_empregados->nome;
        $this->url = 'http://localhost:8000/app/servico/'.$plan_servicos->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.novo-servico')->subject('Novo serviço criado');
    }
}
