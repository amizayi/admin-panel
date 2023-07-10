<?php

namespace Modules\Setting\Repositories\Eloquent;

use Modules\Setting\Entities\Setting;
use Modules\Setting\Repositories\Contracts\SettingRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

class SettingRepositoryEloquent extends BaseRepository implements SettingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Setting::class;
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
