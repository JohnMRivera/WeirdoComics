<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudPedidos extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Vamos hermano solicito un pedido";

    public $id_proveedor;
    public $consultas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id_proveedor, $consultas)
    {
        $this->id_proveedor = $id_proveedor;
        $this->consultas = $consultas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pedidos');
    }
}
