<?php

namespace Fligno\GitlabSdk\Headers;

use Fligno\ApiSdkKit\Abstracts\BaseJsonSerializable;
use Illuminate\Support\Str;

/**
 * Class PrivateToken
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 * @since 2022-01-19
 */
class PrivateToken extends BaseJsonSerializable
{
    /**
     * @var string|null
     */
    public ?string $private_token;

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        $data = parent::jsonSerialize();

        $result = collect(get_object_vars($data))->mapWithKeys(static function ($value, $key) {
            $key = Str::of($key)->replace([' ', '_'], '-')->upper();
            return [ $key->jsonSerialize() => $value ];
        });

        return $result->toArray();
    }
}
