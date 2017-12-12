<?php

namespace app\filters;

class CheckForNothing
{
    public function handle($path, $request)
    {
        echo 'Hello from filter';
    }
}