<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitce154edfcc426b3aa19b3a3d0f3bbf59
{
    public static $files = array (
        '169ddb16f5b4ac1b687289427f08c7a6' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitce154edfcc426b3aa19b3a3d0f3bbf59::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitce154edfcc426b3aa19b3a3d0f3bbf59::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}