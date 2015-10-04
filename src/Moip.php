<?php

namespace Artesaos\Moip;

use Illuminate\Contracts\Foundation\Application;
use Moip\Moip as Api;
use Moip\MoipBasicAuth;

class Moip
{
    /**
     * The Laravel Application.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     **/
    private $app;

    /**
     * Class Moip sdk.
     *
     * @var \Moip\Moip
     **/
    private $moip;

    /**
     * Class constructor.
     * 
     * @param \Illuminate\Contracts\Foundation\Application $app The Laravel Application.
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Start Moip sdk.
     */
    public function start()
    {
        $this->moip = $this->app->make(Api::class, [$this->app->make(MoipBasicAuth::class, [config('artesaos.moip.credentials.token'), config('artesaos.moip.credentials.key')]), $this->getHomologated()]);

        return $this;
    }

    /**
     * Create a new Customer instance.
     *
     * @return \Moip\Moip
     */
    public function customers()
    {
        return $this->moip->customers();
    }

    /**
     * Create a new Entry instance.
     *
     * @return \Moip\Moip
     */
    public function entries()
    {
        return $this->moip->entries();
    }

    /**
     * Create a new Order instance.
     *
     * @return \Moip\Moip
     */
    public function orders()
    {
        return $this->moip->orders();
    }

    /**
     * Create a new Payment instance.
     *
     * @return \Moip\Moip
     */
    public function payments()
    {
        return $this->moip->payments();
    }

    /**
     * Create a new Multiorders instance.
     *
     * @return \Moip\Moip
     */
    public function multiorders()
    {
        return $this->moip->multiorders();
    }

    /**
     * Get endpoint of request.
     * 
     * @return \Moip\Moip::ENDPOINT_PRODUCTION|\Moip\Moip::ENDPOINT_SANDBOX
     */
    private function getHomologated()
    {
        return config('moip.homologated') === true ? Api::ENDPOINT_PRODUCTION : Api::ENDPOINT_SANDBOX;
    }
}
