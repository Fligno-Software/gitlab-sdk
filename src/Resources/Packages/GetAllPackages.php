<?php

namespace Fligno\GitlabSdk\Resources\Packages;

use Fligno\GitlabSdk\Data\Packages\GetAllPackagesAttributes;
use Fligno\GitlabSdk\Resources\BaseResource;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;

/**
 * Class GetAllPackages
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class GetAllPackages extends BaseResource
{
    /**
     * @param int $groupId
     * @param GetAllPackagesAttributes|null $attributes
     * @return AuditLog|PromiseInterface|Response
     */
    public function __invoke(int $groupId, ?GetAllPackagesAttributes $attributes = null): AuditLog|PromiseInterface|Response
    {
        $appendUrl = 'groups/' . $groupId . '/packages';

        return $this->getMakeRequest()->setData($attributes)->executeGet($appendUrl, null, false);
    }
}
