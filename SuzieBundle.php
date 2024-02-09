<?php

namespace KooijmanInc\SuzieBundle;

use KooijmanInc\Suzie\SuzieFactory;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SuzieBundle extends Bundle
{
    /**
     * @return void
     */
    public function boot(): void
    {
        SuzieFactory::setDiContainer($this->container);
    }
}