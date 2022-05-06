<?php

namespace Fligno\GitlabSdk;

use Fligno\ApiSdkKit\Abstracts\BaseApiSdkContainer;
use Fligno\ApiSdkKit\Interfaces\CanGetHealthCheckInterface;
use Fligno\GitlabSdk\Resources\Groups\Groups;
use Fligno\GitlabSdk\Resources\Packages\Packages;
use Fligno\StarterKit\Abstracts\BaseJsonSerializable;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

class GitlabSdk extends BaseApiSdkContainer implements CanGetHealthCheckInterface
{
    /**
     * @param string|null $privateToken
     */
    public function __construct(protected string|null $privateToken)
    {
        $this->setHeaders(
            [
            'PRIVATE-TOKEN' => $this->getPrivateToken()
            ]
        );
    }

    /*****
     * GETTERS & SETTERS
     *****/

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return 'https://' . config('gitlab-sdk.url');
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->getUrl() . '/api/v4';
    }

    /**
     * @return string|null
     */
    public function getPrivateToken(): ?string
    {
        return $this->privateToken;
    }

    /*****
     * RESOURCES
     *****/

    /**
     * @return Groups
     */
    public function groups(): Groups
    {
        return new Groups($this->getMakeRequest());
    }

    /**
     * @return Packages
     */
    public function packages(): Packages
    {
        return new Packages($this->getMakeRequest());
    }

    /**
     * @param  BaseJsonSerializable|Collection|array|null $data
     * @return Model|BaseJsonSerializable|PromiseInterface|Response|Collection|array
     */
    public function getHealthCheck(
        array|Collection|BaseJsonSerializable $data = null
    ): Model|BaseJsonSerializable|PromiseInterface|Response|Collection|array {
        return $this->getMakeRequest()->executeGet('user');
    }
}
