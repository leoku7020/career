<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordToken extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token = $token;
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
                    ->subject("Career 重設密碼通知")
                    ->line("您於 ".date('Y-m-d H:i:s')." 於101 APP管理後台提出 [忘記密碼] 要求，因無法得知您原有密碼，將進行重新設定一組新密碼。")
                    ->line("注意：如果您並未提出 [忘記密碼] 要求，則無需進一步操作，並請聯絡本後台資訊部管理者，以協助您維護帳戶安全。")
                    ->action('點擊這裡開始進行密碼變更程序', url('password/reset', $this->token));
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
