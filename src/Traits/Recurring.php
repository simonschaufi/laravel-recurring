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

namespace Artisanry\Recurring\Traits;

use Artisanry\Recurring\Builder;

trait Recurring
{
    /**
     * @return Builder
     */
    public function recurr(): Builder
    {
        return new Builder($this);
    }

    /**
     * Configuration for the Recurring Trait.
     *
     * @var array
     */
    public function getRecurringConfig()
    {
        return [
            'start_date' => $this->start_at,
            'end_date'   => $this->end_at,
            'timezone'   => $this->timezone,
            'frequency'  => $this->frequency,
            'interval'   => $this->interval,
            'count'      => $this->count,
        ];
    }
}
