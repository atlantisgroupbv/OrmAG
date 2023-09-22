<?php$autoloader = function () {    $files = array(        __DIR__ . '/../../../autoload.php', // composer dependency        __DIR__ . '/../vendor/autoload.php', // stand-alone package    );    foreach ($files as $file) {        if (is_file($file)) {            require_once $file;            return true;        }    }    return false;};if (!$autoloader()) {    die(        'You need to set up the project dependencies using the following commands:' . PHP_EOL .        'curl -s http://getcomposer.org/installer | php' . PHP_EOL .        'php composer.phar install' . PHP_EOL    );}use AtlantisGroup\OrmAG\Console\Command\Make\Model;use AtlantisGroup\OrmAG\Console\Command\Status;use Symfony\Component\Console\Application;$application = new Application('OrmAG', '*');$application->add(new Status());$application->add(new Model());return $application;