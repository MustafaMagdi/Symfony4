<?php

namespace App\Services;

/**
 * Class SeniorDeveloperDecorator
 *
 * @package App\Services
 */
class SeniorDeveloperDecorator extends BaseDeveloper
{
    /**
     * @return int
     */
    public function minYearsOfExperience(): int
    {
        return 3;
    }
}
