<?php

namespace Fligno\GitlabSdk\Resources;

use Fligno\ApiSdkKit\Containers\MakeRequest;

/**
 * Class BaseResource
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
abstract class BaseResource
{
    public function __construct(protected MakeRequest $makeRequest)
    {
    }

    /**
     * @return MakeRequest
     */
    public function getMakeRequest(): MakeRequest
    {
        return $this->makeRequest;
    }
}
