<?php

namespace Modules\Global\Http\Controllers\V1;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class V1BaseController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
