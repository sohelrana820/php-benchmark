<?php

namespace SohelRana820\Benchmark;


/**
 * Class Benchmark
 * @package SohelRana820\Benchmark
 */
class Benchmark
{
    /**
     * @var
     */
    protected $start;

    /**
     * @var
     */
    protected $end;

    /**
     * @var
     */
    protected $memoryUsage;

    /**
     *
     */
    public function start()
    {
        $this->start = microtime();
    }

    /**
     *
     */
    public function end()
    {
        $this->end = microtime();
    }

    /**
     * @return mixed
     */
    public function getStartingTime()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getEndingTime()
    {
        return $this->end;
    }
}