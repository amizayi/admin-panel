<?php

namespace Modules\Global\Contracts\V1\BaseRepositoryInterface;

use Closure;

/**
 * @method all($columns = ['*'])
 * @method first($columns = ['*'])
 * @method paginate($limit = null, $columns = ['*'])
 * @method find($id, $columns = ['*'])
 * @method findByField($field, $value, $columns = ['*'])
 * @method findWhere(array $where, $columns = ['*'])
 * @method findWhereIn($field, array $where, $columns = ['*'])
 * @method findWhereNotIn($field, array $where, $columns = ['*'])
 * @method findWhereBetween($field, array $where, $columns = ['*'])
 * @method create(array $attributes)
 * @method update(array $attributes, $id)
 * @method updateOrCreate(array $attributes, array $values = [])
 * @method delete($id)
 * @method deleteWhere(array $where)
 * @method orderBy($column, $direction = 'asc');
 * @method with(array $relations);
 * @method has(string $relation);
 * @method whereHas(string $relation, Closure $closure);
 * @method hidden(array $fields);
 * @method visible(array $fields);
 * @method scopeQuery(Closure $scope);
 * @method model();
 */
interface BaseRepositoryInterface
{
}
