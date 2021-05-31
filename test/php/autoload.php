#!/usr/bin/env php
<?php declare(strict_types=1);

/*
 * SeaTableAPI Class PHP/Composer Autoload Test
 *
 * Test plan:
 *
 *  [1] vendor/autoload.php exists
 *  [2] can include autoload.php
 *  [3] SeaTableAPI class not loaded
 *  [4] SeaTableAPI class can be auto-loaded
 */

# [1] vendor/autoload.php existence
$path = __DIR__ . '/../../vendor/autoload.php';
if (!is_file($path)) {
    fwrite(STDERR, "[1] fail: no autoload file found, install first.\n");
    exit(1);
}

# [2] require autoload.php
/** @noinspection PhpIncludeInspection */
$result = @include $path;
if (false === $result) {
    fwrite(STDERR, "[2] fail: failure while including autoload.php: \"$path\".\n");
    exit(1);
}

# [3] SeaTableAPI class not loaded
if (class_exists($class = SeaTableAPI::class, $autoload = false)) {
    fwrite(STDERR, "[3] fail: class \"$class\" already loaded.\n");
    exit(1);
}

# [4] SeaTableAPI class can be auto-loaded
if (!class_exists($class = SeaTableAPI::class, $autoload = true)) {
    fwrite(STDERR, "[4] fail: failed to autoload class \"$class\".\n");
    exit(1);
}