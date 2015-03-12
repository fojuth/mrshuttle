<?php namespace MrShuttle\Connection;

class Factory {

  protected $sshKeyPath;

  public function getConnections($connectionNodes){
    $objects = array();

    foreach ($connectionNodes as $node) {
      $object = new Object($node, $this->getPath($node));

      if (false === empty($this->sshKeyPath)) {
        $object->setIdentityFile($this->sshKeyPath);
      }

      $objects[] = $object;
    }

    return $objects;
  }

  protected function getPath($node){
    $nodeCopy = $node;
    $path = array();

    while ($parent = $nodeCopy->xpath('..')) {
      $path[] = (string)$parent[0]->attributes()->Name;

      $nodeCopy = $parent[0];
    }

    return array_reverse($path);
  }

  public function setKeyPath($keyPath){
    $this->sshKeyPath = $keyPath;

    return $this;
  }

}
