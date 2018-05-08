<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit781a6db2cd3b8118ec210ac08b69bbcc
{
    public static $files = array (
        '6b9cbd293adb7d895e163aebb2790539' => __DIR__ . '/..' . '/anax/common/src/functions.php',
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        'dfc9e5dd545737efbb98020db79bfa08' => __DIR__ . '/..' . '/mos/cimage/defines.php',
        '507fe79d3e285fab95fad400b8d42245' => __DIR__ . '/..' . '/mos/cimage/functions.php',
        'f2ac6316094c87de29bd29e1bf7d20bd' => __DIR__ . '/../..' . '/src/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Yaml\\' => 23,
        ),
        'M' => 
        array (
            'Mals17\\' => 7,
        ),
        'A' => 
        array (
            'Anax\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Mals17\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Anax\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/..' . '/anax/configure/src',
            2 => __DIR__ . '/..' . '/anax/di/src',
            3 => __DIR__ . '/..' . '/anax/response/src',
            4 => __DIR__ . '/..' . '/anax/common/src',
            5 => __DIR__ . '/..' . '/anax/view/src',
            6 => __DIR__ . '/..' . '/anax/request/src',
            7 => __DIR__ . '/..' . '/anax/page/src',
            8 => __DIR__ . '/..' . '/anax/router/src',
            9 => __DIR__ . '/..' . '/anax/session/src',
            10 => __DIR__ . '/..' . '/anax/textfilter/src',
            11 => __DIR__ . '/..' . '/anax/url/src',
            12 => __DIR__ . '/..' . '/anax/database/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Michelf' => 
            array (
                0 => __DIR__ . '/..' . '/michelf/php-smartypants',
                1 => __DIR__ . '/..' . '/michelf/php-markdown',
            ),
        ),
        'H' => 
        array (
            'Highlight\\' => 
            array (
                0 => __DIR__ . '/..' . '/scrivo/highlight.php',
            ),
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static $classMap = array (
        'CAsciiArt' => __DIR__ . '/..' . '/mos/cimage/CAsciiArt.php',
        'CCache' => __DIR__ . '/..' . '/mos/cimage/CCache.php',
        'CFastTrackCache' => __DIR__ . '/..' . '/mos/cimage/CFastTrackCache.php',
        'CHttpGet' => __DIR__ . '/..' . '/mos/cimage/CHttpGet.php',
        'CImage' => __DIR__ . '/..' . '/mos/cimage/CImage.php',
        'CRemoteImage' => __DIR__ . '/..' . '/mos/cimage/CRemoteImage.php',
        'CWhitelist' => __DIR__ . '/..' . '/mos/cimage/CWhitelist.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit781a6db2cd3b8118ec210ac08b69bbcc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit781a6db2cd3b8118ec210ac08b69bbcc::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit781a6db2cd3b8118ec210ac08b69bbcc::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit781a6db2cd3b8118ec210ac08b69bbcc::$classMap;

        }, null, ClassLoader::class);
    }
}
