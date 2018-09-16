<?php

namespace App\Http\Requests;

use App\ValidateRules\AreaValidateRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * エリアStoreリクエスト
 */
class AreaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return AreaValidateRule::getRules([
            'name',
            'region_id',
            'patch',
            'map',
            'is_show'
        ]);
    }
}
