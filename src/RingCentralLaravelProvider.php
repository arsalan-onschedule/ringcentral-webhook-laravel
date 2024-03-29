<?php 

namespace ArsalanAzhar\RingCentralWebhookLaravel;

use Illuminate\Support\ServiceProvider;
use ArsalanAzhar\RingCentralWebhook\RingCentralConnector;


class RingCentralLaravelProvider extends ServiceProvider{

    public function register(){
        $this->app->bind(RingCentralWebhookConnector::class, function(){
            return new RingCentralConnector();
        });
    }

    public function boot(){
        $this->publishes([
            __DIR__.'/../config/ringcentral.php' => config_path('ringcentral.php'),
        ], 'ringcentral_config');
    }
}