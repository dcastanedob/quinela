<?php

namespace Propel;

use Zend\ModuleManager\ModuleManager;
class Module
{
    public function init(ModuleManager $moduleManager) {
       
        \Propel::init(__DIR__ . '/build/conf/quinela-conf.php');
       set_include_path(__DIR__ . '/build/classes' . PATH_SEPARATOR . get_include_path());
    }

}