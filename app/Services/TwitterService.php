<?php

namespace App\Services;

use Thujohn\Twitter\Twitter;

class TwitterService
{
    protected $config = [];

    public function __construct()
    {
        /*$this->setConfig([
            'token' => env('TWITTER_ACCESS_TOKEN'),
            'secret' => env('TWITTER_ACCESS_TOKEN_SECRET'),
        ]);*/
   }

   protected function setConfig( $configr = [] )
   {
    //dd($this->config);
      $default_config = config();
      $default_session = session()->getDrivers()['file'];
      $twitterObj = new Twitter($default_config, $default_session);
      
      $this->config = array_replace_recursive( $this->config, $configr );
      //dd($this->config);

      $twitterObj->reconfig( $this->config );
   }

   public function setToken( $token, $secret )
   {
      $this->setConfig([
         'token' => $token,
         'secret' => $secret,
      ]);
   }
}