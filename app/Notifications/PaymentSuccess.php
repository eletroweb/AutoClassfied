<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentSuccess extends Notification
{
    use Queueable;

    private $anuncio;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($anuncio)
    {
        $this->anuncio = $anuncio;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Parabéns, o pagamento do seu anúncio acaba de ser confirmado!')
                    ->line('Agora você já pode alterar informações e visualizar o número de visualizações do seu anúncio.')
                    ->action($this->anuncio->titulo, url($anuncio->getUrl()))
                    ->line('Obrigado pela confiança!');
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
