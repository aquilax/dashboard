<?php

set_time_limit(0);
error_reporting(E_ALL);
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Stockholm');

require __DIR__ . '/../vendor/autoload.php';

$basePath = realpath( __DIR__ . '/../');

$app = new \Slim\Slim;

$app->get('/', function () use ($app) {
    $dsn = sprintf('sqlite:../db/data.sqlite3');
    $pdo = new \PDO($dsn);

    function getValue($pdo, $type)
    {
        $sql = 'SELECT value
                FROM log
                WHERE type = :type
                ORDER BY created DESC
                LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':type', $type, \PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ($res) {
            return $res[0]['value'];
        }
        return 0;
    }

    $data = [
        'products' => getValue($pdo, 1),
        'articles' => getValue($pdo, 2),
    ];
    $app->render('index.tpl.php', $data);
});

$app->get('/add/:type/:value', function ($type, $value) use ($app) {
    $dsn = sprintf('sqlite:../db/data.sqlite3');
    $pdo = new \PDO($dsn);
    $sql = 'INSERT INTO log (`type`, `value`) VALUES (:type, :value);';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':type', $type, \PDO::PARAM_INT);
    $stmt->bindValue(':value', $value, \PDO::PARAM_INT);
    $res = $stmt->execute();
    $app->response->write('OK');
});

$app->run();
