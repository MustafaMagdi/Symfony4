<?php

namespace App\Services;

/**
 * Class SeniorDeveloper
 *
 * @package App\Services
 */
class SeniorDeveloper extends BaseDeveloper
{
    /**
     * @return int
     */
    public function minYearsOfExperience(): int
    {
        return 5;
    }
}
