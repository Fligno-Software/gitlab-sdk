<?php

namespace Fligno\GitlabSdk\Resources\Users;

use Fligno\GitlabSdk\Resources\BaseResource;
use JetBrains\PhpStorm\Pure;

/**
 * Class Users
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class Users extends BaseResource
{
    /**
     * @return GetAllUsers
     */
    #[Pure] public function all(): GetAllUsers
    {
        return new GetAllUsers($this->getMakeRequest());
    }

    /**
     * @return GetCurrentUser
     */
    #[Pure] public function current(): GetCurrentUser
    {
        return new GetCurrentUser($this->getMakeRequest());
    }

    /**
     * @return GetOneUser
     */
    #[Pure] public function get(): GetOneUser
    {
        return new GetOneUser($this->getMakeRequest());
    }
}
