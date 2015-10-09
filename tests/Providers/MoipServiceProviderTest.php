<?php

namespace Artesaos\Moip\Tests\Providers;

use PHPUnit_Framework_TestCase;
use Artesaos\Moip\Providers\MoipServiceProvider;
use Illuminate\Contracts\Foundation\Application;

/**
* class testeMoipServiceProvider
*/
class MoipServiceProviderTest extends PHPUnit_Framework_TestCase
{
	public function testProvides()
	{
		$service_provider = new MoipServiceProvider(Application::class);
		
		$this->assertEquals(['moip'], $service_provider->provides());
	}
}