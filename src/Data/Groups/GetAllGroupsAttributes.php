<?php

namespace Fligno\GitlabSdk\Data\Groups;

use Fligno\StarterKit\Abstracts\BaseJsonSerializable;
use Fligno\GitlabSdk\Traits\Attributes\OffSetBasedPaginationTrait;

/**
 * Class GetAllGroupsAttributes
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class GetAllGroupsAttributes extends BaseJsonSerializable
{
    use OffSetBasedPaginationTrait;

    /**
     * Skip the group IDs passed
     *
     * @var int[]|null
     */
    public array|null $skip_groups;

    /**
     * Show all the groups you have access to (defaults to false for authenticated users, true for administrators);
     * Attributes owned and min_access_level have precedence
     *
     * @var bool|null
     */
    public bool|null $all_available;

    /**
     * Return the list of authorized groups matching the search criteria
     *
     * @var string|null
     */
    public string|null $search;

    /**
     * Order groups by name, path, id, or similarity (if searching, introduced in GitLab 14.1). Default is name
     * Link: https://gitlab.com/gitlab-org/gitlab/-/issues/332889
     *
     * @var string|null
     */
    public string|null $order_by;

    /**
     * Order groups in asc or desc order. Default is asc
     *
     * @var string|null
     */
    public string|null $sort;

    /**
     * Include group statistics (administrators only)
     *
     * @var bool|null
     */
    public bool|null $statistics;

    /**
     * Include custom attributes in response (administrators only)
     * Link: https://docs.gitlab.com/ee/api/custom_attributes.html
     *
     * @var bool|null
     */
    public bool|null $with_custom_attributes;

    /**
     * Limit to groups explicitly owned by the current user
     *
     * @var bool|null
     */
    public bool|null $owned;

    /**
     *     Limit to groups where current user has at least this access level
     *
     * @var int|null
     */
    public int|null $min_access_level;

    /**
     * Limit to top level groups, excluding all subgroups
     *
     * @var bool|null
     */
    public bool|null $top_level_only;
}
