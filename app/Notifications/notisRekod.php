<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\Telegram;
use PhpParser\Node\Expr\Cast\String_;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;


class notisRekod extends Notification
{
    use Queueable;
    private $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        foreach ($info as $information) {
           $taman = $information->taman;
           $jalan = $information->jalan;
           $tamat_ccc = $information->tamat_ccc;

           $this->message .= "Taman = ".$taman."\r\nJalan = ".$jalan."\r\nTamatCCC = ".$tamat_ccc."\r\n\r\n";
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
                ->to('@igreenmpk')
                ->content("
                    Pemberitahuan !
                    \r\nSenarai yang perlu dikemaskini :
                    \r\n".$this->message."Terima Kasih");

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
