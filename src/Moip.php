<?php

namespace Artesaos\Moip;

use Illuminate\Database\Eloquent\Model;
use Artesaos\Moip\Repositories\Moip\MoipEloquent;
use Illuminate\Container\Container as Application;

class Moip
{
    /**
     * The table associated with the Moip model.
     *
     * @var Artesaos\Moip\Repositories\Moip\MoipEloquent
     **/
    private $moip_data;

    /**
     * The IoC.
     *
     * @var Illuminate\Container\Container
     */
    protected $app;

    /**
     * Initialize class.
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->moip_data = $this->app->make(MoipEloquent::class);
    }

    public function order()
    {
        dd($this->moip_data->first()->toArray());
    }
}
