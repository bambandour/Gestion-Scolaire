<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailSenders extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mail;
    public $subject;
    public function __construct($mail, $subject)
    {
        $this->mail=$mail;
        $this->subject = $subject;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address('biidesign04@gmail.com','cheikh bi') ,
    //         subject: 'Email Senders',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'viewmail.blade.php',
    //     );
    // }

    public function build()
    {
        $mes=$this->mail;
        return $this->from('biidesign04@gmail.com','cheikh bi')
        ->subject($this->subject)
        ->view('viewmail')
        ->with([
            'messages'=> $mes,
        ])
        ->attach($this->getAttachmentPath());
    }
    
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            public_path("")
        ];
    }
    public function getAttachmentPath()
    {
        return public_path('image.png');
    }


}
