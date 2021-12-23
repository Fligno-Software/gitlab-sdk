<?php

namespace Fligno\GitlabSdk\Resources\Composer;

use Fligno\GitlabSdk\GitlabSdk;
use Fligno\GitlabSdk\Resources\BaseResource;
use JetBrains\PhpStorm\Pure;

/**
 * Class Composer
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class Composer extends BaseResource
{
    /**
     * @return GetAllPackages
     */
    #[Pure] public function allPackages(): GetAllPackages
    {
        return new GetAllPackages($this->gitlabSdk);
    }

    #[Pure] public function getMetadata(): GetPackageMetadata
    {
        return new GetPackageMetadata($this->gitlabSdk);
    }
}
