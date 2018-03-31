<?php

namespace App\Annotations\Listeners;

use Doctrine\Common\Annotations\Reader;

class AnnotationListener
{
    /**
     * @var \Doctrine\Common\Annotations\Reader
     */
    protected $annotationReader;

    /**
     * AnnotationListener constructor.
     *
     * @param \Doctrine\Common\Annotations\Reader $annotationReader
     */
    public function __construct(Reader $annotationReader)
    {
        $this->annotationReader = $annotationReader;
    }

    public function isClassAnnotation(string $class, string $annotation): bool
    {
        return true;
    }

    public function isMethodAnnotation(string $method, string $annotation): bool
    {
        return true;
    }
}
