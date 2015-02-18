<?php namespace MrShuttle\Connection;

class Object
{

  private $node;

  /**
   * @var array
   */
  private $rootPath;

  public function __construct($node, array $rootPath)
  {
    $this->node = $node;
    $this->rootPath = $rootPath;
  }

  public function getPath($startFromLevel = 0){
    return array_slice($this->rootPath, $startFromLevel);
  }

  public function getName(){
    return (string)$this->node->attributes()->Name;
  }

}
