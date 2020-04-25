<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $correo;
    public $asunto;
    public $mensaje;


    public function __construct($micorreo, $miasunto, $mimensaje)
    {
        $this->correo = $micorreo;
        $this->asunto = $miasunto;
        $this->mensaje = $mimensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.confirmacion');
    }
}
