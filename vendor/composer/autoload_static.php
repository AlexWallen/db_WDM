<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

<<<<<<< HEAD
class ComposerStaticInitebf574bc8e6ff92d03c34677222006a8
=======
class ComposerStaticInit9408c3e477989ec6062a1119af44a549
>>>>>>> e383db9e3414dc615f86c58489a525a17f4dc87c
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/container-interop/container-interop/src/Interop/Container',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
<<<<<<< HEAD
            $loader->prefixLengthsPsr4 = ComposerStaticInitebf574bc8e6ff92d03c34677222006a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitebf574bc8e6ff92d03c34677222006a8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitebf574bc8e6ff92d03c34677222006a8::$prefixesPsr0;
=======
            $loader->prefixLengthsPsr4 = ComposerStaticInit9408c3e477989ec6062a1119af44a549::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9408c3e477989ec6062a1119af44a549::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9408c3e477989ec6062a1119af44a549::$prefixesPsr0;
>>>>>>> e383db9e3414dc615f86c58489a525a17f4dc87c

        }, null, ClassLoader::class);
    }
}
