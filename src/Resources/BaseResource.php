<?php

namespace Fligno\GitlabSdk\Resources;

use Fligno\GitlabSdk\GitlabSdk;

/**
 * Class BaseResource
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
abstract class BaseResource
{
    public function __construct(protected GitlabSdk $gitlabSdk)
    {}

    /**
     * @return GitlabSdk
     */
    public function getGitlabSdk(): GitlabSdk
    {
        return $this->gitlabSdk;
    }
}
