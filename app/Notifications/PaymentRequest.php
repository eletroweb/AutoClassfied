<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentRequest extends Notification
{
    use Queueable;

    private $anuncio, $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($anuncio)
    {
        $this->anuncio = $anuncio;
        $this->email = $this->anuncio->users->email;
        $this->transaction = $anuncio->transaction;
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
                    ->subject('Pagamento do seu anúncio')
                    ->line("Olá {$this->anuncio->users->name}, você optou por realizar o pagamento do seu anúncio por boleto.")
                    ->line('Caso não saiba, boletos tem um prazo de até 3 dias úteis para a confirmação do seu pagamento.')
                    ->action('Boleto', $this->anuncio->transaction->paymentLink)
                    ->line('Obrigado pelo confiança, desejamos boas vendas!');
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
