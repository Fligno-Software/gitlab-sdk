<?php

namespace Fligno\GitlabSdk;

use Fligno\GitlabSdk\Resources\Composer\Composer;
use Fligno\GitlabSdk\Resources\Groups\Groups;
use Fligno\GitlabSdk\Resources\Packages\Packages;
use Fligno\GitlabSdk\Resources\Users\Users;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\Pure;

class GitlabSdk
{
    /**
     * @param string|null $privateToken
     */
    public function __construct(protected string|null $privateToken)
    {}

    /***** GETTERS & SETTERS *****/

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
     * @return string
     */
    public function getUrl(): string
    {
        return 'https://' . config('gitlab-sdk.api_url');
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->getUrl() . '/api/v4';
    }

    /**
     * @param bool $is_post_method
     * @param string $append_url
     * @param array $data
     * @return PromiseInterface|Response
     */
    public function makeRequest(bool $is_post_method = FALSE, string $append_url = '', array $data = []): PromiseInterface|Response
    {
        // Prepare URL

        $url = $this->getApiUrl();

        if(empty(trim($append_url)) === FALSE) {
            $url .= '/' . $append_url;
        }

        // Prepare Private Token
        $privateToken = $this->getPrivateToken();

        // Prepare Data

        $data = array_filter_recursive($data);

        // Prepare HTTP call

        $response = Http::withHeaders(['PRIVATE-TOKEN' => $privateToken])->bodyFormat('json');

        // Initiate HTTP call

        if ($is_post_method) {
            $response = $response->post($url, $data);
        }
        else {
            $response = $response->get($url, $data);
        }

        return $response;
    }

    /***** RESOURCES *****/

    /**
     * @return Composer
     */
    #[Pure] public function composer(): Composer
    {
        return new Composer($this);
    }

    /**
     * @return Groups
     */
    #[Pure] public function groups(): Groups
    {
        return new Groups($this);
    }

    /**
     * @return Packages
     */
    #[Pure] public function packages(): Packages
    {
        return new Packages($this);
    }

    /**
     * @return Users
     */
    #[Pure] public function users(): Users
    {
        return new Users($this);
    }
}
