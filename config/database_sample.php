<?php
/**
 * Config file for Database.
 *
 * Example for MySQL.
 *  "dsn" => "mysql:host=localhost;dbname=test;",
 *  "username" => "test",
 *  "password" => "test",
 *  "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
 *
 * Example for SQLite.
 *  "dsn" => "sqlite:memory::",
 *
 */

/**
* Serverdatabas
*/
if ($_SERVER["SERVER_NAME"] === "www.student.bth.se") {
    return [
        "dsn"               => "mysql:host=blu-ray.student.bth.se;dbname=mals17;",
        "username"          => "*****",
        "password"          => "*****",
        "driver_options"    => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
        "fetch_mode"        => \PDO::FETCH_OBJ,
        "table_prefix"      => null,
        "session_key"       => "Anax\Database",

        "verbose"           => false,
        "debug_connect"     => true,
    ];
}


/*
* Lokal databas
*/

return [
    "dsn"             => "mysql:host=127.0.0.1:3307;dbname=movies;",
    "username"        => "user",
    "password"        => "pass",
    "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    "fetch_mode"      => \PDO::FETCH_OBJ,
    "table_prefix"    => null,
    "session_key"     => "Anax\Database",

    // True to be very verbose during development
    "verbose"         => null,

    // True to be verbose on connection failed
    "debug_connect"   => false,
];
