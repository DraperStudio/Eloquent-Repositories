<?php



declare(strict_types=1);

namespace BrianFaust\Eloquent\Repositories\Traits;

trait RequireTrait
{
    /**
     * @param $column
     * @param $value
     * @param array $columns
     *
     * @return mixed
     */
    public function requireBy($column, $value, $columns = ['*'])
    {
        if (!$record = $this->findFirstBy($column, $value, $columns)) {
            $this->modelNotFound($this->getModel());
        }

        return $record;
    }

    /**
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function requireById($id, $columns = ['*'])
    {
        return $this->requireBy('id', $id, $columns);
    }
}
