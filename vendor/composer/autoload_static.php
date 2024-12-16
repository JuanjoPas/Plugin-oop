<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit024ada10626b941caee249aa13d55928
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
            'MiPluginOOPReutilizable\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'MiPluginOOPReutilizable\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit024ada10626b941caee249aa13d55928::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit024ada10626b941caee249aa13d55928::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit024ada10626b941caee249aa13d55928::$classMap;

        }, null, ClassLoader::class);
    }
}
