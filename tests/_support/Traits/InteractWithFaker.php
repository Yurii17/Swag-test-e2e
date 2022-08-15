<?php

namespace Traits;

use Faker\Factory;
use Faker\Generator;

trait InteractWithFaker
{
    /**
     * @return Generator
     */
    public function faker(): Generator
    {
        return Factory::create();
    }
}
