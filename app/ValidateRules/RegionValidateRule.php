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
        'id' => ['require', 'num'],
        'name' => ['required', 'max:255'],
    ];
}