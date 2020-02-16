<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6214d98cc77ee48043e488fc92bb2ef8
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '0d59ee240a4cd96ddbb4ff164fccea4d' => __DIR__ . '/..' . '/symfony/polyfill-php73/bootstrap.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Php73\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Contracts\\Translation\\' => 30,
            'Symfony\\Contracts\\Service\\' => 26,
            'Symfony\\Component\\Yaml\\' => 23,
            'Symfony\\Component\\Validator\\' => 28,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\Console\\' => 26,
            'Symfony\\Component\\Config\\' => 25,
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Php73\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php73',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Contracts\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation-contracts',
        ),
        'Symfony\\Contracts\\Service\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/service-contracts',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Symfony\\Component\\Validator\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/validator',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Symfony\\Component\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/config',
        ),
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Propel' => 
            array (
                0 => __DIR__ . '/..' . '/propel/propel/src',
            ),
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static $classMap = array (
        'JsonException' => __DIR__ . '/..' . '/symfony/polyfill-php73/Resources/stubs/JsonException.php',
        'models\\Assignature' => __DIR__ . '/../..' . '/v1.0/models/Assignature.php',
        'models\\AssignatureQuery' => __DIR__ . '/../..' . '/v1.0/models/AssignatureQuery.php',
        'models\\Base\\Assignature' => __DIR__ . '/../..' . '/v1.0/models/Base/Assignature.php',
        'models\\Base\\AssignatureQuery' => __DIR__ . '/../..' . '/v1.0/models/Base/AssignatureQuery.php',
        'models\\Base\\Career' => __DIR__ . '/../..' . '/v1.0/models/Base/Career.php',
        'models\\Base\\CareerQuery' => __DIR__ . '/../..' . '/v1.0/models/Base/CareerQuery.php',
        'models\\Base\\Note' => __DIR__ . '/../..' . '/v1.0/models/Base/Note.php',
        'models\\Base\\NoteQuery' => __DIR__ . '/../..' . '/v1.0/models/Base/NoteQuery.php',
        'models\\Career' => __DIR__ . '/../..' . '/v1.0/models/Career.php',
        'models\\CareerQuery' => __DIR__ . '/../..' . '/v1.0/models/CareerQuery.php',
        'models\\Map\\AssignatureTableMap' => __DIR__ . '/../..' . '/v1.0/models/Map/AssignatureTableMap.php',
        'models\\Map\\CareerTableMap' => __DIR__ . '/../..' . '/v1.0/models/Map/CareerTableMap.php',
        'models\\Map\\NoteTableMap' => __DIR__ . '/../..' . '/v1.0/models/Map/NoteTableMap.php',
        'models\\Note' => __DIR__ . '/../..' . '/v1.0/models/Note.php',
        'models\\NoteQuery' => __DIR__ . '/../..' . '/v1.0/models/NoteQuery.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6214d98cc77ee48043e488fc92bb2ef8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6214d98cc77ee48043e488fc92bb2ef8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6214d98cc77ee48043e488fc92bb2ef8::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit6214d98cc77ee48043e488fc92bb2ef8::$classMap;

        }, null, ClassLoader::class);
    }
}