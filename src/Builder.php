<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Recurring.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Recurring;

use DateTime;
use Recurr\Rule;
use DateTimeZone;
use Carbon\Carbon;
use Recurr\Frequency;
use Recurr\RecurrenceCollection;
use Recurr\Transformer\ArrayTransformer;
use Recurr\Transformer\ArrayTransformerConfig;

class Builder
{
    /** @var mixed */
    private $recurring;

    /** @var \BrianFaust\Recurring\Config */
    private $config;

    /**
     * @param mixed  $recurring
     */
    public function __construct($recurring)
    {
        $this->recurring = $recurring;
        $this->config = $this->buildConfig();
    }

    /**
     * @return bool|\DateTime
     */
    public function first()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        return Carbon::instance($schedule->first()->getStart());
    }

    /**
     * @return bool|\DateTime
     */
    public function last()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        return Carbon::instance($schedule->last()->getStart());
    }

    /**
     * @return bool|\DateTime
     */
    public function next()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        return Carbon::instance($schedule->next()->getStart());
    }

    /**
     * @return bool|\DateTime
     */
    public function current()
    {
        if (! $schedule = $this->schedule()) {
            return false;
        }

        return Carbon::instance($schedule->current()->getStart());
    }

    /**
     * @return \Recurr\RecurrenceCollection
     */
    public function schedule(): RecurrenceCollection
    {
        $transformerConfig = new ArrayTransformerConfig();
        $transformerConfig->enableLastDayOfMonthFix();

        $transformer = new ArrayTransformer();
        $transformer->setConfig($transformerConfig);

        return $transformer->transform($this->rule());
    }

    /**
     * @return \Recurr\Rule
     */
    public function rule(): Rule
    {
        $config = $this->getConfig();

        $rule = (new Rule())
            ->setStartDate(new DateTime($config['start_date'], new DateTimeZone($config['timezone'])))
            ->setTimezone($config['timezone'])
            ->setFreq($this->getFrequencyType())
            ->setInterval($config['interval'])
            ->setCount($config['count']);

        if (! empty($config['end_date'])) {
            $rule = $rule->setEndDate(new DateTime($config['end_date'], new DateTimeZone($config['timezone'])));
        }

        return $rule;
    }

    /**
     * @return string
     */
    public function getFrequencyType(): string
    {
        $frequency = $this->getFromConfig('frequency');

        if (! in_array($frequency, $this->config->getFrequencies())) {
            throw new \InvalidArgumentException("$frequency is not a valid frequency");
        }

        return $frequency;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    private function getFromConfig($key)
    {
        return $this->config->{'get'.studly_case($key)}();
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config->toArray();
    }

    /**
     * @return \BrianFaust\Recurring\Config
     */
    private function buildConfig(): Config
    {
        $config = $this->recurring->getRecurringConfig();

        return new Config(
            $config['start_date'], $config['end_date'], $config['timezone'],
            $config['frequency'], $config['interval'], $config['count']
        );
    }
}
