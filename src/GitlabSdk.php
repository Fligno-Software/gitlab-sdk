<?php

namespace Fligno\GitlabSdk;

use Fligno\ApiSdkKit\Abstracts\BaseApiSdkContainer;
use Fligno\ApiSdkKit\Containers\MakeRequest;
use Fligno\GitlabSdk\Headers\PrivateToken;
use Fligno\GitlabSdk\Resources\Groups\Groups;
use Fligno\GitlabSdk\Resources\Packages\Packages;
use Fligno\GitlabSdk\Resources\Users\Users;

class GitlabSdk extends BaseApiSdkContainer
{
    /**
     * @param string|null $privateToken
     */
    public function __construct(protected string|null $privateToken)
    {}

    /***** GETTERS & SETTERS *****/

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
    public function getPrivateToken(): string|null
    {
        return $this->privateToken;
    }

    /**
     * @param string|null $privateToken
     */
    public function setPrivateToken(?string $privateToken): void
    {
        $this->privateToken = $privateToken;
    }

    /**
     * @return MakeRequest
     */
    protected function getGitlabMakeRequest(): MakeRequest
    {
        $header = new PrivateToken();

        $header->private_token = $this->getPrivateToken();

        return $this->getMakeRequest()->setHeaders($header);
    }

    /***** RESOURCES *****/

    /**
     * @return Groups
     */
    public function groups(): Groups
    {
        return new Groups($this->getGitlabMakeRequest());
    }

    /**
     * @return Packages
     */
    public function packages(): Packages
    {
        return new Packages($this->getGitlabMakeRequest());
    }

    /**
     * @return Users
     */
    public function users(): Users
    {
        return new Users($this->getGitlabMakeRequest());
    }
}
