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

namespace Artisanry\Tests\Recurring;

class RecurringTraitTest extends AbstractTestCase
{
    /** @test */
    public function recurring_instantiates_builder()
    {
        $recurring = new RecurringExample();

        $builder = $recurring->recurr();

        $this->assertTrue($builder instanceof \Artisanry\Recurring\Builder);
    }

    /** @test */
    public function recurring_model_instantiates_builder()
    {
        $recurring = new RecurringModelExample();

        $builder = $recurring->recurr();

        $this->assertTrue($builder instanceof \Artisanry\Recurring\Builder);
    }
}

class RecurringExample
{
    use \Artisanry\Recurring\Traits\Recurring;

    private $start_at = '';
    private $end_at = '';
    private $timezone = '';
    private $frequency = '';
    private $interval = 0;
    private $count = null;
}

class RecurringModelExample extends \Illuminate\Database\Eloquent\Model
{
    use \Artisanry\Recurring\Traits\Recurring;

    private $start_at = '';
    private $end_at = '';
    private $timezone = '';
    private $frequency = '';
    private $interval = 0;
    private $count = null;
}
