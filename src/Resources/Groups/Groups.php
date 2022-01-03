<?php

namespace Fligno\GitlabSdk\Resources\Groups;

use Fligno\GitlabSdk\Resources\BaseResource;
use JetBrains\PhpStorm\Pure;

/**
 * Class Groups
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class Groups extends BaseResource
{
    /**
     * @return GetAllGroups
     */
    #[Pure] public function all(): GetAllGroups
    {
        return new GetAllGroups($this->getGitlabSdk());
    }

    /**
     * @return GetOneGroup
     */
    #[Pure] public function get(): GetOneGroup
    {
        return new GetOneGroup($this->getGitlabSdk());
    }
}
