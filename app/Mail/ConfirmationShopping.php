<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationShopping extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;
    public $mascota;

    public function __construct($order, $user, $mascota)
    {
        $this->order = $order;
        $this->user = $user;
        $this->mascota = $mascota;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Detalles del Pedido',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.confirmation',
        );
    }

    public function attachments()
    {
        return [];
    }
}
