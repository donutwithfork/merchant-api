<?php

declare(strict_types=1);

namespace App\Common\Loader;

class ClassLoader
{
    public static function load($className): string
    {
        $pdo = new \PDO($_ENV['DATABASE_URL'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
        $stmt = $pdo->prepare('SELECT path, code, class_name FROM cache_class WHERE class_name = ?');
        $stmt->execute([$className]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
        $rootPath = __DIR__.'/../../..';
        $f = fopen($rootPath . $result['path'], 'w');
        fwrite($f, $result['code']);
        fclose($f);

        return $result['class_name'];
    }
}