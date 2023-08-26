<?php

namespace Kdcwinner\Securitycode;

use Kdcwinner\Securitycode\Models\Securitycode as SecuritycodeModel;

class Securitycode
{
    public function data()
    {
        return SecuritycodeModel::getRandomData();
    }
}
