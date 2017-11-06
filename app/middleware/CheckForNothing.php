<?php

namespace app\middleware;

class CheckForNothing
{
    public function handle($path, $request)
    {
        echo 'Hello from middleware';
    }
}