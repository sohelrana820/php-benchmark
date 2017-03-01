<?php

use SohelRana820\Benchmark\Benchmark;

class BenchmarkTests extends PHPUnit_Framework_TestCase
{
    /**
     * @var \SohelRana820\Benchmark\Benchmark
     */
    protected $benchmark;

    public function setUp()
    {
        $this->benchmark = new Benchmark();
        parent::setUp();
    }

    public function testBenchmarking()
    {
        $this->benchmark->start();
        for ($counter = 0; $counter < 10000; $counter++) {
            // Write some code to execute
        }
        $this->benchmark->end();

        $this->assertNotNull($this->benchmark->getStartingTime());
        $this->assertNotNull($this->benchmark->getEndingTime());

        $this->assertNotNull($this->benchmark->getTime());
        $this->assertTrue(is_string($this->benchmark->getTime()));
        $this->assertFalse(is_string($this->benchmark->getTime(true)));

        $this->assertNotNull($this->benchmark->getMemoryUsage());
        $this->assertTrue(is_string($this->benchmark->getMemoryUsage()));
        $this->assertFalse(is_string($this->benchmark->getMemoryUsage(true)));

        $this->assertFalse(is_string($this->benchmark->getPeakMemory(true)));
        $this->assertTrue(is_string($this->benchmark->getPeakMemory()));
        $this->assertFalse(is_string($this->benchmark->getPeakMemory(true)));

        $this->assertTrue(is_string(Benchmark::readableElapsedTime(911111, '%.3f%s')));
        $this->assertTrue(is_string(Benchmark::readableMemorySize(911111, '%.2f%s')));
        $this->assertTrue(is_string(Benchmark::readableMemorySize(1024, '%.2f%s')));
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}
