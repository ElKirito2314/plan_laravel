<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\plan_obras;

class NovaObraMail extends Mailable
{
    use Queueable, SerializesModels;
    public $plan_obras;
    public $data;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plan_obras $plan_obras)
    {
        $this->plan_obras = $plan_obras->nome;
        $this->data = date('d/m/Y', strtotime($plan_obras->data_inicio));
        $this->url = 'http://localhost:8000/app/obra/'.$plan_obras->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.nova-obra')->subject('Nova obra criada');
    }
}
