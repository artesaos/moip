<?php

namespace Artesaos\Moip\Tests\Providers;

use Artesaos\Moip\Providers\MoipServiceProvider;
use Artesaos\Moip\Tests\MoipTestCase;
use Illuminate\Contracts\Foundation\Application;

/**
* class testeMoipServiceProvider
*/
class MoipServiceProviderTest extends MoipTestCase
{
	/**
	 * Test if provider return moip string
	 */
	public function testProvides()
	{
		$service_provider = new MoipServiceProvider(Application::class);
		
		$this->assertEquals(['moip'], $service_provider->provides());
	}
}