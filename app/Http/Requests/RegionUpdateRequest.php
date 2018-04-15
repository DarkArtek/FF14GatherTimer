<?php

namespace App\Http\Requests;

use App\ValidateRules\RegionValidateRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * リージョンUpdateリクエスト
 */
class RegionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return RegionValidateRule::GetAllRules();
    }
}
