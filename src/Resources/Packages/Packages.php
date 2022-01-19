<?php

namespace Fligno\GitlabSdk\Resources\Packages;

use Fligno\GitlabSdk\Resources\BaseResource;
use JetBrains\PhpStorm\Pure;

/**
 * Class Packages
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class Packages extends BaseResource
{
    /**
     * @return GetAllPackages
     */
    #[Pure] public function allPackages(): GetAllPackages
    {
        return new GetAllPackages($this->getMakeRequest());
    }
}
