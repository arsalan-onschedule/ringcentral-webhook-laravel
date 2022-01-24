<?php 

namespace App\Channels;

use ArsalanAzhar\AdaptivecardPhp\Card;
use ArsalanAzhar\AdaptivecardPhp\Elements\TextBlockElement;
use ArsalanAzhar\RingCentralWebhook\RingCentralConnector;
use Illuminate\Notifications\Notification;

class RingcentralChannel{

    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toRingcentral($notifiable);

        if (!isset($data['ringcentral_incoming_webhook_url'])) 
            return;


        $connector = new RingCentralConnector($data['ringcentral_incoming_webhook_url']);

        $card = new Card();

        $card->setElement(
            (new TextBlockElement())
                ->setText("ReTeam by BeRemote")
                ->setWrap()
                ->setFontType("default")
                ->setSize("large")
                ->setWeight("Bolder")
                ->setColor("Accent")
                ->setSpacing("Medium")

        );




        $card = $notification->prepareAdaptiveCardNotification($card);

        $connector->send($card);

    }
}