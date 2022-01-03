<?php

namespace Fligno\GitlabSdk\Resources\Users;

use Fligno\GitlabSdk\Resources\BaseResource;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;

/**
 * Class GetCurrentUser
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class GetCurrentUser extends BaseResource
{
    /**
     * @return PromiseInterface|Response
     */
    public function __invoke(): PromiseInterface|Response
    {
        return $this->getGitlabSdk()->makeRequest(false, 'user');
    }
}
