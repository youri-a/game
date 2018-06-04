<?php

class Autoloader
{
    static $map = [
        'Classes\\' => 'Classes',
        'Classes\\Weapons\\' => 'Classes\Weapons',
        'Classes\\Strategy\\' => 'Classes\Strategy',
        'Classes\\Armors\\' => 'Classes\Armors'

    ];

    static public function loader($class_name)
    {
        $namespaceMatches = [];
        preg_match('/.*\\\\/', $class_name, $namespaceMatches);
        $namespace = reset($namespaceMatches);
        $className = str_replace($namespace, '', $class_name);
        if (isset(self::$map[$namespace])) {
            $directory = self::$map[$namespace];
            include $directory . DIRECTORY_SEPARATOR . $className . '.php';
        } else {
            throw new InvalidArgumentException("Could not load class $class_name");
        }
    }
}

spl_autoload_register('Autoloader::loader');