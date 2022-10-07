<?php

namespace Framework\Http;
require '../routes/web.php';

class Kernel
{
    /**
     * @return void
     */
    public static function handle (): void
    {
        Route::run();
    }
}