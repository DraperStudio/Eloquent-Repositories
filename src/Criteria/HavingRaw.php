<?php

declare(strict_types=1);

/*
 * This file is part of Eloquent Repositories.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Eloquent\Repositories\Criteria;

use Artisanry\Eloquent\Repositories\Contracts\Repository;
use Illuminate\Database\Eloquent\Model;

class HavingRaw extends Criterion
{
    /**
     * @var
     */
    private $sql;

    /**
     * @var array
     */
    private $bindings;

    /**
     * @var string
     */
    private $boolean;

    /**
     * HavingRaw constructor.
     *
     * @param $sql
     * @param array  $bindings
     * @param string $boolean
     */
    public function __construct($sql, array $bindings = [], $boolean = 'and')
    {
        $this->sql = $sql;
        $this->bindings = $bindings;
        $this->boolean = $boolean;
    }

    /**
     * @param Model      $model
     * @param Repository $repository
     *
     * @return mixed
     */
    public function apply(Model $model, Repository $repository)
    {
        return $model->havingRaw($this->sql, $this->bindings, $this->boolean);
    }
}
