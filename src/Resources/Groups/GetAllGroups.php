<?php

namespace Fligno\GitlabSdk\Resources\Groups;

use Fligno\GitlabSdk\Resources\BaseResource;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;

/**
 * Class GetAllGroups
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class GetAllGroups extends BaseResource
{
    /**
     * @return PromiseInterface|Response
     */
    public function __invoke(): PromiseInterface|Response
    {
            return $this->gitlabSdk->makeRequest(false, 'groups');
    }
}
