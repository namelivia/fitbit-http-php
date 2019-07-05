<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Carbon\Carbon;

/**
 * This is the root test class. All tests will extend from here.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
	public function setUp()
	{
		Carbon::setTestNow(Carbon::create('2019', '03', '21', '10', '25', '40'));
	}
}
