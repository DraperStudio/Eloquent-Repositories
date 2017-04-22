<?php



declare(strict_types=1);

namespace BrianFaust\Eloquent\Repositories\Traits;

trait SlugTrait
{
    /**
     * @param $slug
     * @param array $columns
     *
     * @return mixed
     */
    public function findBySlug($slug, $columns = ['*'])
    {
        return $this->findFirstBy('slug', $slug, $columns);
    }

    /**
     * @param $slug
     * @param array $columns
     *
     * @return mixed
     */
    public function requireBySlug($slug, $columns = ['*'])
    {
        if (!$record = $this->findBySlug($slug, $columns)) {
            $this->modelNotFound($this->model);
        }

        return $record;
    }

    /**
     * @param $slug
     * @param array $data
     *
     * @return mixed
     */
    public function updateBySlug($slug, array $data)
    {
        $model = $this->requireBySlug($slug);

        return $this->updateModel($model, $data);
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function deleteBySlug($slug)
    {
        return $this->findBySlug($slug)->delete();
    }
}
