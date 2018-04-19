<?php
/**
 * User: ななつき
 * Date: 2018/03/23
 */

namespace App\Exceptions;

class ConflictException extends ExpectedException
{
    protected $message = 'conflict exception';
}
