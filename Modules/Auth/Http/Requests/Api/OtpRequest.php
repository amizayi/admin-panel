<?php

namespace Modules\Auth\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Fields\OtpFields;

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
