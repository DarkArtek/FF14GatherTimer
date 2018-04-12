<?php
/**
 * User: ななつき
 * Date: 2018/03/25
 */

namespace App\ValidateRules;

/**
 * リージョンのバリデーションルール
 */
class RegionValidateRule extends ValidateRule
{
    protected static $rules = [
        'id' => ['required', 'num'],
        'name' => [
            'required',
            'max:255',
            'unique:region_master',
        ],
    ];
}