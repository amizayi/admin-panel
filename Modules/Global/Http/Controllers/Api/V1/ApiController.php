<?php

namespace Modules\Global\Http\Controllers\Api\V1;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Global\Traits\ApiResponseTrait;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    use ApiResponseTrait, AuthorizesRequests, ValidatesRequests;
}
