<?php

namespace App\Http\Requests;

use App\ValidateRules\GatherItemValidateRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * 採取アイテムupdateリクエスト
 */
class GatherItemUpdateRequest extends FormRequest
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
        return GatherItemValidateRule::getRules([
            'name',
            'star',
            'level',
            'patch',
            'discernment',
            'purified_items',
            'icon',
        ]);
    }
}
