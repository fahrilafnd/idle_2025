<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ParticipationMail extends Mailable
{
   use Queueable, SerializesModels;

   public $data;

   public function __construct($data)
   {
      $this->data = $data;
   }

   public function build()
   {
      $data = $this->data[0];
      return $this->from($data['pengirim'])
                  ->view('mails.surat-partisipasi')
                  ->with(
                   [
                       'tim' => $data['tim'],
                       'kategori' => $data['kategori'],
                       'peserta' => $data['peserta']
                   ]);
   }
}
