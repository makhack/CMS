<?php

namespace Ipf\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IpfUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
