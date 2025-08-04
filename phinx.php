<?php

require_once __DIR__ . "/config/bootstrap.php";

return [
    "paths" => [
        "migrations" => __DIR__ . "/database/migrations"
    ],
    "environments" => [
        "default_migration_table" => "migrations",
        "default_environment" => "development",
        "development" => [
            "adapter" => "mysql",
            "host" => $_ENV["DB_HOST"],
            "name" => $_ENV["DB_DATABASE"],
            "user" => $_ENV["DB_USERNAME"],
            "pass" => $_ENV["DB_PASSWORD"],
            "port" => $_ENV["DB_PORT"],
            "charset" => "utf8mb4"
        ]
    ]
];
