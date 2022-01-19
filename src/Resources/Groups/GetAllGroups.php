<?php

namespace Fligno\GitlabSdk\Resources\Groups;

use Fligno\GitlabSdk\Data\Groups\GetAllGroupsAttributes;
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
     * @param GetAllGroupsAttributes|null $attributes
     * @return PromiseInterface|Response
     */
    public function __invoke(?GetAllGroupsAttributes $attributes = null): PromiseInterface|Response
    {
        return $this->getMakeRequest()->setData($attributes)->executeGet('groups');
    }
}
