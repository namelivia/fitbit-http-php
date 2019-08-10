<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests;

use Mockery;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Api\Weight;

class ApiWeightTest extends TestCase
{
    private $fitbit;
    private $weight;

    public function setUp()
    {
        parent::setUp();
        $this->fitbit = Mockery::mock(Fitbit::class);
        $this->weight = new Weight($this->fitbit);
    }

    public function testGettingAFatInstance()
    {
        $this->assertTrue($this->weight->fat() instanceof \Namelivia\Fitbit\Weight\Fat);
    }
}
