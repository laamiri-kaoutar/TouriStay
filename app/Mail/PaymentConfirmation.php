<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $amount;
    public $days ;
    public $start_date ;
    public $end_date;
    /**
     * Create a new message instance.
     */
    public function __construct($amount,$days,$start_date, $end_date)
    {
        $this->amount=$amount;
        $this->days=$days;
        $this->start_date=$start_date;
        $this->end_date=$end_date;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    public function build()
    {
        return $this->from('admin@touristay.com', 'Touristay Admin') 
                    ->subject('Confirmation de Paiement')
                    ->view('emails.payment_confirmation')
                    ->with([
                        'amount' => number_format($this->amount / 100, 2) . '€',
                        'days' => $this->days,
                        'start_date' => $this->start_date,
                        'to' => $this->end_date,
                    ]);
    }
}
