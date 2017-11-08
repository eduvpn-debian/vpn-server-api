#!/usr/bin/env php
<?php

/**
 * eduVPN - End-user friendly VPN.
 *
 * Copyright: 2016-2017, The Commons Conservancy eduVPN Programme
 * SPDX-License-Identifier: AGPL-3.0+
 */
$baseDir = dirname(__DIR__);

// find the autoloader (package installs, composer)
foreach (['src', 'vendor'] as $autoloadDir) {
    if (@file_exists(sprintf('%s/%s/autoload.php', $baseDir, $autoloadDir))) {
        require_once sprintf('%s/%s/autoload.php', $baseDir, $autoloadDir);
        break;
    }
}

use SURFnet\VPN\Common\CliParser;
use SURFnet\VPN\Server\Storage;

try {
    $p = new CliParser(
        'remove old data from storage',
        [
            'instance' => ['the VPN instance', true, false],
        ]
    );

    $opt = $p->parse($argv);
    if ($opt->hasItem('help')) {
        echo $p->help();
        exit(0);
    }

    $instanceId = $opt->hasItem('instance') ? $opt->getItem('instance') : 'default';

    $dataDir = sprintf('%s/data/%s', $baseDir, $instanceId);
    $db = new PDO(sprintf('sqlite://%s/db.sqlite', $dataDir));
    $storage = new Storage($db, new DateTime('now'));

    $storage->cleanConnectionLog(new DateTime('now -32 days'));
    $storage->cleanTotpLog(new DateTime('now -5 minutes'));
    $storage->cleanUserMessages(new DateTime('now -32 days'));
} catch (Exception $e) {
    echo sprintf('ERROR: %s', $e->getMessage()).PHP_EOL;
    exit(1);
}
