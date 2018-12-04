<?php
/**
 * User: ななつき
 * Date: 2018/03/25
 */

namespace App\ValidateRules;

/**
 * 採取アイテムのバリデーションルール
 */
class GatherItemValidateRule extends ValidateRule
{
    protected static $rules = [
        'id' => [
            'required',
            'numeric'
        ],
        'name' => [
            'required',
            'string',
            'max:255',
//            'unique:gather_item',
        ],
        'star' => [
            'required',
            'numeric',
            'max:10',
        ],
        'level' => [
            'required',
            'numeric',
            'max:70',
        ],
        'patch' => [
            'required',
            'string',
        ],
        'discernment' => [
            'nullable',
            'numeric',
            'max:9999',
        ],
        'purified_items' => [
            'nullable',
            'array',
        ],
        'icon' => [
            'nullable',
            'file',
            'image',
            'mimes:jpeg,jpg,png',
            'dimensions:min_width=10,min_height=10,max_width=1000,max_height=1000',
        ]
    ];
}
