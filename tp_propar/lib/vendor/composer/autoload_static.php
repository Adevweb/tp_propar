<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita6aeb8a47d832118461f821cafabc477
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita6aeb8a47d832118461f821cafabc477::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita6aeb8a47d832118461f821cafabc477::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
