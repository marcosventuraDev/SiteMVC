<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit777cb523e04908fc9ab250a866d24332
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit777cb523e04908fc9ab250a866d24332::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit777cb523e04908fc9ab250a866d24332::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit777cb523e04908fc9ab250a866d24332::$classMap;

        }, null, ClassLoader::class);
    }
}
