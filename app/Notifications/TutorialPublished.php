<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Http\Controllers\ScholarshipController;
use Illuminate\Http\Request;
use App\scholarship;
use App\requirement;
use Session;
use App\Http\Controllers\Controller;

class TutorialPublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($tutorial)
     {
         $this->tuto=$scholarships;
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
        $value = Session::get('nama');
        $flag = Session::get('flag');
        $id = Session::get('id');
        if($flag == 1) {
          $str = 'Jangan lewatkan kesempatanmu mendaftar beasiswa "';
          $str1 = '", ayo cek sekarang!';
        }
        else {
          $str = 'Ayo daftar beasiswa "';
          $str1 = '", sebelum batas waktu berakhir, ayo cek sekarang!';
        }
        return (new MailMessage)
                    ->subject('Beasiswa Yang Cocok Untukmu Telah Hadir!')
                    ->line($str .$value. $str1)
                    ->action('Masuk ke website', url('/description/'.$id))
                    ->line('Semoga harimu menyenangkan!');
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
