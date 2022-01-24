<?php 

namespace ArsalanAzhar\RingCentralWebhookLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class RingCentralWebhookConnector extends Facade{

    protected static function getFacadeAccessor()
    {
        return RingCentralWebhookConnector::class;
    }
}

