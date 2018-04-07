<?php

namespace App\Services;

use App\Interfaces\DeveloperInterface;

/**
 * Class BaseDeveloper
 *
 * @package App\Services
 */
abstract class BaseDeveloper implements DeveloperInterface
{
    /**
     * @return int
     */
    abstract public function minYearsOfExperience(): int;

    /**
     * @return string
     */
    public function level(): string
    {
        if ($this->minYearsOfExperience() >= 5) {
            return 'Senior';
        }

        return 'Junior';
    }
}
