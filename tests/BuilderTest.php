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

namespace BrianFaust\Tests\Recurring;

use Carbon\Carbon;

class BuilderTest extends AbstractTestCase
{
    /** @test */
    public function next_returns_carbon_instance()
    {
        $recurring = new RecurringClass(['count' => 2]);

        $builder = $recurring->recurr();

        $this->assertTrue($builder->next() instanceof Carbon);
    }

    /** @test */
    public function next_returns_false_if_no_more_recurrances()
    {
        $recurring = new RecurringClass(['count' => 1]);

        $builder = $recurring->recurr();

        $this->assertFalse($builder->next());
    }
}

class RecurringClass
{
    use \BrianFaust\Recurring\Traits\Recurring;

    private $start_at;
    private $end_at;
    private $timezone;
    private $frequency;
    private $interval;
    private $count;

    public function __construct(array $attributes = [])
    {
        $this->start_at = $attributes['start_at'] ?? Carbon::now()->format('Y-m-d H:i:s');
        $this->end_at = $attributes['end_at'] ?? Carbon::now()->format('Y-m-d H:i:s');
        $this->timezone = $attributes['timezone'] ?? Carbon::now()->format('e');
        $this->frequency = $attributes['frequency'] ?? 'DAILY';
        $this->interval = $attributes['interval'] ?? 1;
        $this->count = $attributes['count'] ?? null;
    }
}
