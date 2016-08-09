<?php

// Active autoload class
require_once __DIR__.'/autoload.php';

$logo = <<<EOL
______ ______________  ___  ___ _____ _____ _____ _   _ 
|  ___|  _  | ___ \  \/  | / _ \_   _|_   _|  _  | \ | |
| |_  | | | | |_/ / .  . |/ /_\ \| |   | | | | | |  \| |
|  _| | | | |    /| |\/| ||  _  || |   | | | | | | . ` |
| |   \ \_/ / |\ \| |  | || | | || |  _| |_\ \_/ / |\  |
\_|    \___/\_| \_\_|  |_/\_| |_/\_/  \___/ \___/\_| \_/

Twitter : @darkilliant
EOL;
echo $logo.PHP_EOL.PHP_EOL;

$container = require_once __DIR__ . '/container.php';

$container['box_cookie']->show();
$container['box_cookie']->show();




