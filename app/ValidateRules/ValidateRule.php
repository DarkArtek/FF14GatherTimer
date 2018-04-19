<?php
/**
 * User: ななつき
 * Date: 2018/03/25
 */

namespace App\ValidateRules;

/**
 * バリデーションルールの取得
 */
abstract class ValidateRule
{
    /**
     * @var array
     */
    protected static $rules;

    /**
     * @return array
     */
    public static function getAllRules()
    {
        return static::$rules;
    }

    /**
     * @param array $allowed
     * @return array
     */
    public static function getRules(array $allowed)
    {
        return array_intersect_key(static::$rules, array_flip($allowed));
    }
}
