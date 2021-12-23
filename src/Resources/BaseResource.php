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
    public function __construct(public GitlabSdk $gitlabSdk)
    {}
}
