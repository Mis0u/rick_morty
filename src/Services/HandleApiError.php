<?php

namespace App\Services;

use Exception;

class HandleApiError
{
    public function getError($target, int $error)
    {
        if ($target === $error) {
            throw new Exception('Faux');
        }
    }
}
