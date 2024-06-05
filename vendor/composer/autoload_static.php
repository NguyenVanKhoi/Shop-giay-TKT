<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcdc6184261bc337ea84ad4ccc5127708
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
        'P' => 
        array (
            'Phroute\\Phroute\\' => 16,
        ),
        'A' => 
        array (
            'Admin\\Duan1\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
        'Phroute\\Phroute\\' => 
        array (
            0 => __DIR__ . '/..' . '/phroute/phroute/src/Phroute',
        ),
        'Admin\\Duan1\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcdc6184261bc337ea84ad4ccc5127708::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcdc6184261bc337ea84ad4ccc5127708::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcdc6184261bc337ea84ad4ccc5127708::$classMap;

        }, null, ClassLoader::class);
    }
}