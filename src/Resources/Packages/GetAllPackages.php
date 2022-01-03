<?php

namespace Fligno\GitlabSdk\Resources\Packages;

use Fligno\GitlabSdk\Resources\BaseResource;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * Class GetAllPackages
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class GetAllPackages extends BaseResource
{
    /**
     * @var Collection
     */
    protected Collection $attributes;

    /**
     * @param int $groupId
     * @param Collection|array $attributes
     * @return PromiseInterface|Response
     */
    public function __invoke(int $groupId, Collection|array $attributes): PromiseInterface|Response
    {
        $appendUrl = 'groups/' . $groupId . '/packages';

        $this->setAttributes($attributes);

        return $this->getGitlabSdk()->makeRequest(false, $appendUrl, $this->getAttributes()->toArray());
    }

    /***** SETTERS & GETTERS *****/

    /**
     * @param Collection|array $attributes
     * @return $this
     */
    public function setAttributes(Collection|array $attributes): static
    {
        if (! ($attributes instanceof Collection)) {
            $attributes = collect($attributes);
        }

        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes;
    }
}
