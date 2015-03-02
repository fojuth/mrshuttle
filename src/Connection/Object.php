<?php namespace MrShuttle\Connection;

class Object
{

  private $node;

  /**
   * @var array
   */
  private $rootPath;

  private $attributes;

  public function __construct($node, array $rootPath)
  {
    $this->node = $node;

    foreach ($rootPath as $part) {
      $this->rootPath[] = $part;
    }

  }

  protected function getAttributes(){
    if (true === empty($this->attributes)) {
      $this->attributes = $this->node->attributes();
    }

    return $this->attributes;
  }

  public function getPath($startFromLevel = 0){
    return array_slice($this->rootPath, $startFromLevel);
  }

  public function getName(){
    return (string)$this->getAttributes()->Name;
  }

  public function getHost(){
    return (string)$this->getAttributes()->Hostname;
  }

  public function getUser(){
    return (string)$this->getAttributes()->Username;
  }

  public function getPort(){
    return (string)$this->getAttributes()->Port;
  }

  public function getCommand(){
    $command = array('ssh');

    $host = $this->getHost();
    $user = $this->getUser();
    $port = $this->getPort();

    if (false === empty($user)) {
      $host = $user.'@'.$host;
    }

    $command[] = $host;

    if (false === empty($port)) {
      $command[] = '-p '.$port;
    }

    return join(' ', $command);
  }

}
