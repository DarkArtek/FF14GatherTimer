<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase;

abstract class BaseTestCase extends TestCase
{
    use CreatesApplication;

    /**
     * ランダム文字列生成 (英数字)
     * $length: 生成する文字数
     * @param int $length
     * @return null|string
     */
    public function makeRandStr(int $length): ?string
    {
        $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        $result = null;
        for ($i = 0; $i < $length; $i++) {
            $result .= $str[random_int(0, count($str) - 1)];
        }
        return $result;
    }
}
