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
    protected $executionTime;

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
        $this->memoryUsage = memory_get_usage(true);
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

    /**
     * If param $raw = true, then return the raw execution time
     * Otherwise it's a human readable elapsed time
     *
     * @param bool $raw
     * @return string
     */
    public function getTime($raw = false)
    {
        $this->executionTime = $this->end - $this->start;
        return ($raw) ? $this->executionTime : self::readableElapsedTime($this->executionTime);
    }

    /**
     * Returns a human readable elapsed time
     *
     * @param $microTime
     * @param null $format
     * @param int $round
     * @return string
     */
    public static function readableElapsedTime($microTime, $format = null, $round = 3)
    {
        if (is_null($format)) {
            $format = '%.3f%s';
        }
        if ($microTime >= 1) {
            $unit = 's';
            $time = round($microTime, $round);
        } else {
            $unit = 'ms';
            $time = round($microTime * 1000);
            $format = preg_replace('/(%.[\d]+f)/', '%d', $format);
        }
        return sprintf($format, $time, $unit);
    }

    /**
     * @param bool $raw
     * @param null $format
     * @return string
     */
    public function getMemoryUsage($raw = false, $format = null)
    {
        return $raw ? $this->memoryUsage : self::readableMemorySize($this->memoryUsage, $format);
    }

    /**
     * Returns a human readable memory size
     *
     * @param $size
     * @param null $format
     * @param int $round
     * @return string
     */
    public static function readableMemorySize($size, $format = null, $round = 3)
    {
        $mod = 1024;
        if (is_null($format)) {
            $format = '%.2f%s';
        }

        $units = explode(' ', 'B Kb Mb Gb Tb');
        for ($i = 0; $size > $mod; $i++) {
            $size /= $mod;
        }

        if (0 === $i) {
            $format = preg_replace('/(%.[\d]+f)/', '%d', $format);
        }
        return sprintf($format, round($size, $round), $units[$i]);
    }

    /**
     * Returns the memory peak, readable or not
     *
     * @param bool $raw
     * @param null $format
     * @return int|string
     */
    public function getPeakMemory($raw = false, $format = null)
    {
        $memory = memory_get_peak_usage(true);
        return $raw ? $memory : self::readableMemorySize($memory, $format);
    }
}
