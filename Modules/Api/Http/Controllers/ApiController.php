<?php

namespace Modules\Api\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Api\Traits\ApiResponseTrait;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    use ApiResponseTrait, AuthorizesRequests, ValidatesRequests;
}
