<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit793c1204233ac0a5acec50d346919734
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Trnx\\Usermanager\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Trnx\\Usermanager\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit793c1204233ac0a5acec50d346919734::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit793c1204233ac0a5acec50d346919734::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit793c1204233ac0a5acec50d346919734::$classMap;

        }, null, ClassLoader::class);
    }
}
