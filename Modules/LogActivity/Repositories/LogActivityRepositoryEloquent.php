<?php

namespace Modules\LogActivity\Repositories;

use Modules\LogActivity\Contracts\Repositories\LogActivityRepository;
use Modules\LogActivity\Entities\LogActivity;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class LogActivityRepositoryEloquent extends BaseRepository implements LogActivityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return LogActivity::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
