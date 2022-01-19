<?php

namespace Fligno\GitlabSdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class GitlabSdk
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 *
 * @see \Fligno\GitlabSdk\GitlabSdk
 */
class GitlabSdk extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'gitlab-sdk';
    }
}
