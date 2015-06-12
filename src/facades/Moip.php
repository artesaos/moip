<?php

namespace Artesaos\Moip\facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Moip extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'moipapi';
    }
}
