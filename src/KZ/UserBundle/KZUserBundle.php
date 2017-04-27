<?php

namespace KZ\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KZUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
