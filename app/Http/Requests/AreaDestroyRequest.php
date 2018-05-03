<?php

namespace App\Http\Requests;

use App\ValidateRules\AreaValidateRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * エリアDestroyリクエスト
 */
class AreaDestroyRequest extends FormRequest
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
        return AreaValidateRule::getRules(['id']);
    }
}
