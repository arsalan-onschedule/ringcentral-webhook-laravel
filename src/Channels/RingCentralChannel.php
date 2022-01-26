<?php 

namespace ArsalanAzhar\RingCentralWebhookLaravel\Channels;

use ArsalanAzhar\RingCentralWebhook\RingCentralConnector;
use Illuminate\Notifications\Notification;

class RingCentralChannel{

    public function send($notifiable, Notification $notification)
    {

        // get webhook url
        $webhookUrl = $notification->{config('ringcentral.channel.notification.webhook_url_var_name')} ?? null;

        if (!$webhookUrl) 
            return;

        // parse message data from notificaiton
        $data = $notification->toRingcentral($notifiable);

        try {
            $connector = new RingCentralConnector($webhookUrl);

            // post message on webhook url
            $connector->send($data);

        }catch (\Exception $exception) {

            throw $exception;
        }
    }
}