<?php

namespace Fligno\GitlabSdk\Data\Packages;

use Fligno\StarterKit\Abstracts\BaseJsonSerializable;
use Fligno\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;

/**
 * Class GetAllPackagesAttributes
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class GetAllPackagesAttributes extends BaseJsonSerializable
{
    use OffSetBasedPaginationTrait;

    /**
     * @var int|string|null
     */
    public int|string|null $id;

    /**
     * @var string|null
     */
    public string|null $order_by;

    /**
     * @var string|null
     */
    public string|null $sort;

    /**
     * @var string|null
     */
    public string|null $package_type;

    /**
     * @var string|null
     */
    public string|null $package_name;

    /**
     * @var bool|null
     */
    public bool|null $include_versionless;

    /**
     * @var string|null
     */
    public string|null $status;
}
