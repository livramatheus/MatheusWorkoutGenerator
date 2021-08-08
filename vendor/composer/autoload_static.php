<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit57063e07e834aacc5c13784cc8024e45
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mwg\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mwg\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Mwg\\Controller\\ControllerExercise' => __DIR__ . '/../..' . '/src/Controller/ControllerExercise.php',
        'Mwg\\Controller\\ControllerFooter' => __DIR__ . '/../..' . '/src/Controller/ControllerFooter.php',
        'Mwg\\Controller\\ControllerLog' => __DIR__ . '/../..' . '/src/Controller/ControllerLog.php',
        'Mwg\\Controller\\ControllerMain' => __DIR__ . '/../..' . '/src/Controller/ControllerMain.php',
        'Mwg\\Controller\\ControllerStimulus' => __DIR__ . '/../..' . '/src/Controller/ControllerStimulus.php',
        'Mwg\\Controller\\ControllerWorkout' => __DIR__ . '/../..' . '/src/Controller/ControllerWorkout.php',
        'Mwg\\Controller\\ControllerWorkoutExercise' => __DIR__ . '/../..' . '/src/Controller/ControllerWorkoutExercise.php',
        'Mwg\\Core\\CookieKeys' => __DIR__ . '/../..' . '/src/Core/CookieKeys.php',
        'Mwg\\Core\\CookieTerms' => __DIR__ . '/../..' . '/src/Core/CookieTerms.php',
        'Mwg\\Core\\Db' => __DIR__ . '/../..' . '/src/Core/Db.php',
        'Mwg\\Core\\HttpRequest' => __DIR__ . '/../..' . '/src/Core/HttpRequest.php',
        'Mwg\\Core\\StringUtils' => __DIR__ . '/../..' . '/src/Core/StringUtils.php',
        'Mwg\\Core\\UrlManager' => __DIR__ . '/../..' . '/src/Core/UrlManager.php',
        'Mwg\\Model\\ModelExercise' => __DIR__ . '/../..' . '/src/Model/ModelExercise.php',
        'Mwg\\Model\\ModelGroup' => __DIR__ . '/../..' . '/src/Model/ModelGroup.php',
        'Mwg\\Model\\ModelLevel' => __DIR__ . '/../..' . '/src/Model/ModelLevel.php',
        'Mwg\\Model\\ModelLog' => __DIR__ . '/../..' . '/src/Model/ModelLog.php',
        'Mwg\\Model\\ModelMain' => __DIR__ . '/../..' . '/src/Model/ModelMain.php',
        'Mwg\\Model\\ModelStimulus' => __DIR__ . '/../..' . '/src/Model/ModelStimulus.php',
        'Mwg\\Model\\ModelWorkout' => __DIR__ . '/../..' . '/src/Model/ModelWorkout.php',
        'Mwg\\Model\\ModelWorkoutExercise' => __DIR__ . '/../..' . '/src/Model/ModelWorkoutExercise.php',
        'Mwg\\Persistence\\PersistenceDefault' => __DIR__ . '/../..' . '/src/Persistence/PersistenceDefault.php',
        'Mwg\\Persistence\\PersistenceExercise' => __DIR__ . '/../..' . '/src/Persistence/PersistenceExercise.php',
        'Mwg\\Persistence\\PersistenceGroup' => __DIR__ . '/../..' . '/src/Persistence/PersistenceGroup.php',
        'Mwg\\Persistence\\PersistenceLevel' => __DIR__ . '/../..' . '/src/Persistence/PersistenceLevel.php',
        'Mwg\\Persistence\\PersistenceLog' => __DIR__ . '/../..' . '/src/Persistence/PersistenceLog.php',
        'Mwg\\Persistence\\PersistenceStimulus' => __DIR__ . '/../..' . '/src/Persistence/PersistenceStimulus.php',
        'Mwg\\Persistence\\PersistenceWorkout' => __DIR__ . '/../..' . '/src/Persistence/PersistenceWorkout.php',
        'Mwg\\Persistence\\PersistenceWorkoutExercise' => __DIR__ . '/../..' . '/src/Persistence/PersistenceWorkoutExercise.php',
        'Mwg\\View\\ViewFooter' => __DIR__ . '/../..' . '/src/View/ViewFooter.php',
        'Mwg\\View\\ViewMain' => __DIR__ . '/../..' . '/src/View/ViewMain.php',
        'Mwg\\View\\ViewWorkout' => __DIR__ . '/../..' . '/src/View/ViewWorkout.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit57063e07e834aacc5c13784cc8024e45::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit57063e07e834aacc5c13784cc8024e45::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit57063e07e834aacc5c13784cc8024e45::$classMap;

        }, null, ClassLoader::class);
    }
}
