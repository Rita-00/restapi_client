<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit11b6bef70effd323dff4c324261cce99
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Asus\\Untitled2\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Asus\\Untitled2\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit11b6bef70effd323dff4c324261cce99::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit11b6bef70effd323dff4c324261cce99::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit11b6bef70effd323dff4c324261cce99::$classMap;

        }, null, ClassLoader::class);
    }
}
