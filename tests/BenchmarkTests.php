<?php

class BenchmarkTests extends PHPUnit_Framework_TestCase
{
    /**
     * @var \SohelRana820\Benchmark\Benchmark
     */
    protected $benchmark;

    public function setUp()
    {
        $this->benchmark = new SohelRana820\Benchmark\Benchmark();
        parent::setUp();
    }

    public function testStartigTime()
    {
        $this->benchmark->start();
        $this->assertNotNull($this->benchmark->getStartingTime());
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}