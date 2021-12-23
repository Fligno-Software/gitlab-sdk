<?php

namespace Fligno\GitlabSdk\Resources\Packages;

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
     * @return PromiseInterface|Response
     */
    public function __invoke(int $groupId): PromiseInterface|Response
    {
        $appendUrl = 'groups/' . $groupId . '/packages';

        $data = [
            'package_type'=>'composer',
            'order_by' => 'name'
        ];

        return $this->gitlabSdk->makeRequest(false, $appendUrl, $data);
    }
}
