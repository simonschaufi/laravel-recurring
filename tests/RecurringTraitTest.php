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

use BrianFaust\Tests\Recurring\AbstractTestCase;

class RecurringTraitTest extends AbstractTestCase
{
    /** @test */
    public function recurring_instantiates_builder()
    {
        $recurring = new RecurringExample;

        $builder = $recurring->recurr();

        $this->assertTrue($builder instanceof \BrianFaust\Recurring\Builder);
    }
}

class RecurringExample
{
    use \BrianFaust\Recurring\Traits\Recurring;

    private $start_at = '';
    private $end_at = '';
    private $timezone = '';
    private $frequency = '';
    private $interval = 0;
    private $count = null;
}
