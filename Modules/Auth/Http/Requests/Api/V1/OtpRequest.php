<?php

namespace Modules\Auth\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Fields\V1\OtpFields;

class OtpRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            OtpFields::MOBILE => 'nullable',
            OtpFields::EMAIL  => 'email|required_without:'.OtpFields::MOBILE
        ];
    }
}
