<?php
/**
 * User: ななつき
 * Date: 2018/03/25
 */

namespace App\ValidateRules;

/**
 * エリアのバリデーションルール
 */
class AreaValidateRule extends ValidateRule
{
    protected static $rules = [
        'id' => ['required', 'num'],
        'name' => [
            'required',
            'max:255',
            'unique:area_master',
        ],
        'region_id' => [
            'required',
            'numeric',
            'exists:region_master,id',
        ],
        'patch' => [
            'nullable',
            'string',
        ],
        'map' => [
            'required',
            'string',
        ],
        'is_show' => [
            'required',
            'boolean',
        ],
    ];
}
