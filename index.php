<?php

use MrShuttle\Connection\Factory;
use MrShuttle\Input\Parser;
use MrShuttle\Output\Builder;
use MrShuttle\Output\JsonFormatter;
use MrShuttle\Output\Template;

require 'vendor/autoload.php';

$source_file = 'confCons.xml';

$parser = new Parser($source_file);
$connectionFactory = new Factory();

$sshKey = null;

foreach ($argv as $index => $arg) {
  if ('-i' === $arg) {
    $sshKey = $argv[$index + 1];
  }
}

if (false === empty($sshKey)) {
  $connectionFactory->setKeyPath($sshKey);
}

$connections = $connectionFactory->getConnections($parser->getParsed());

$builder = new Builder($connections);

$hosts = $builder->getHosts();

$formatter = new JsonFormatter();
$template = new Template();
$hosts_json = $formatter->format(json_encode($hosts), true, true);

file_put_contents('.shuttle.json', $template->render($hosts_json));
