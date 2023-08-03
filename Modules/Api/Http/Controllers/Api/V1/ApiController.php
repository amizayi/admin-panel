<?php

namespace Modules\Api\Http\Controllers\Api\V1;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Modules\Api\Traits\ApiResponseTrait;

class ApiController extends Controller
{
    use ApiResponseTrait, AuthorizesRequests, ValidatesRequests;
}
