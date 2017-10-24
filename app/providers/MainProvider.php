<?php

namespace app\providers;

use app\core\bundles\ioc\IoC;

class MainProvider
{
    public function call() : void {
        IoC::bind('test', function ($app){
            return new class {
                public function test()
                {
                    echo 'testa';
                }
            };
        });

    }
}