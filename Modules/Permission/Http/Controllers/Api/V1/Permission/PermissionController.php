<?php

namespace Modules\Permission\Http\Controllers\Api\V1\Permission;

use Illuminate\Http\JsonResponse;
use Modules\Kernel\Http\Controllers\Api\V1\ApiController;
use Modules\Permission\Entities\V1\Permission\PermissionFields;
use Modules\Permission\Transformers\V1\Permission\PermissionResource;
use Modules\Permission\Transformers\V1\Permission\PermissionResourceCollection;

class PermissionController extends ApiController
{
    /**
     * get list of Permission
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $permissions = permission()->with('children')
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
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $permission = permission()->find($id);
        return $this->successResponse(new PermissionResource($permission),__response());
    }

}
