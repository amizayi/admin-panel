<?php

namespace Modules\Permission\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Modules\Permission\Entities\Permission;
use Modules\Api\Http\Controllers\ApiController;
use Modules\Permission\Fields\PermissionFields;
use Modules\Permission\Transformers\Permission\PermissionResourceCollection;
use Modules\Permission\Transformers\Permission\PermissionResource;

class PermissionController extends ApiController
{
    /**
     * get list of Permission
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $permissions = Permission::with('children')
            ->select([
                PermissionFields::ID,
                PermissionFields::NAME,
                PermissionFields::TITLE
            ])
            ->whereNull(PermissionFields::PARENT_ID)
            ->get();

        return $this->successResponse(new PermissionResourceCollection($permissions), __response());
    }


    /**
     * get Permission by id
     *
     * @param Permission $permission
     * @return JsonResponse
     */
    public function show(Permission $permission): JsonResponse
    {
        return $this->successResponse(new PermissionResource($permission),__response());
    }

}
