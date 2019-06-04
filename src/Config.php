<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Recurring.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Recurring;

use Illuminate\Contracts\Support\Arrayable;
use Recurr\Frequency;

class Config implements Arrayable
{
    /** @var \DateTime */
    private $startDate;

    /** @var \DateTime */
    private $endDate;

    /** @var string */
    private $timezone;

    /** @var int */
    private $frequency;

    /** @var int */
    private $interval;

    /** @var int */
    private $count;

    /** @var array */
    private $frequencies = [
        Frequency::YEARLY   => 'YEARLY',
        Frequency::MONTHLY  => 'MONTHLY',
        Frequency::WEEKLY   => 'WEEKLY',
        Frequency::DAILY    => 'DAILY',
        Frequency::HOURLY   => 'HOURLY',
        Frequency::MINUTELY => 'MINUTELY',
        Frequency::SECONDLY => 'SECONDLY',
    ];

    /**
     * @param string      $startDate
     * @param string|null $endDate
     * @param string      $timezone
     * @param string      $frequency
     * @param int         $interval
     * @param int         $count
     */
    public function __construct(string $startDate, $endDate, string $timezone, string $frequency, int $interval, int $count = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->timezone = $timezone;
        $this->frequency = $frequency;
        $this->interval = $interval;
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $value
     *
     * @return \Artisanry\Recurring\Config
     */
    public function setStartDate($value): self
    {
        $this->startDate = $value;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string $value
     *
     * @return \Artisanry\Recurring\Config
     */
    public function setEndDate($value): self
    {
        $this->endDate = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $value
     *
     * @return Config
     */
    public function setTimezone($value): self
    {
        $this->timezone = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrequency(): string
    {
        return $this->frequency;
    }

    /**
     * @param int $value
     *
     * @return \Artisanry\Recurring\Config
     */
    public function setFrequency($value): self
    {
        $this->frequency = $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getInterval(): int
    {
        return $this->interval;
    }

    /**
     * @param int $value
     *
     * @return \Artisanry\Recurring\Config
     */
    public function setInterval($value): self
    {
        $this->interval = $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $value
     *
     * @return \Artisanry\Recurring\Config
     */
    public function setCount($value): self
    {
        $this->count = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getFrequencies(): array
    {
        return $this->frequencies;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'start_date' => $this->startDate,
            'end_date'   => $this->endDate,
            'timezone'   => $this->timezone,
            'frequency'  => $this->frequency,
            'interval'   => $this->interval,
            'count'      => $this->count,
        ];
    }
}
