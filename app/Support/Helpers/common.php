<?php

use Illuminate\Support\Facades\DB;


if (!function_exists('transaction')) {

    function transaction(Closure $closure, int $attempts = 1): mixed
    {
        if (DB::transactionLevel() > 0) {
            return $closure;
        }

        return DB::transaction($closure, $attempts);
    }
}
