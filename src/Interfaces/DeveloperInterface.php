<?php

namespace App\Interfaces;

/**
 * Interface DeveloperInterface
 *
 * @package App\Interfaces
 */
interface DeveloperInterface
{
    /**
     * @return int
     */
    public function minYearsOfExperience(): int;

    /**
     * @return string
     */
    public function level(): string;
}
