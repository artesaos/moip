<?php

namespace Artesaos\Moip\Repositories\Moip;

use Artesaos\Moip\Model\Moip;

class MoipEloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     **/
    private $model;

    /**
     * Create a new Eloquent model instance.
     */
    public function __construct(array $sss)
    {
        $this->model = with(Moip::class);

        return $this;
    }

    /**
     * Dynamically create members and methods.
     *
     * @param string $method
     * @param array  $args
     *
     * @return call_user_func_array
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }
}
