<?php

namespace app\providers;

use app\hearth\bundles\ioc\IoC;

class ServiceContainer
{
    public function register() : void {

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