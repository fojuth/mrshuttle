<?php namespace MrShuttle\Connection;

class Factory {

  public function getConnections($connectionNodes){
    $objects = array();

    foreach ($connectionNodes as $node) {
      $objects[] = new Object($node, $this->getPath($node));
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

}
