<?php namespace MrShuttle\Input;

use MrShuttle\NodeObject\Connection;
use MrShuttle\NodeObject\Container;

class Parser
{
  private $xml;
  private $connections = array();

  public function __construct($inputFile)
  {
    $this->xml = new \SimpleXMLElement(file_get_contents($inputFile));
  }

  public function getParsed()
  {
    foreach ($this->xml->children() as $node) {
      $connections = $this->getChildren($node);

//      foreach ($connections as $connection) {
////        var_dump((string)$connection->attributes()->Name);
//      }
    }

    foreach ($this->connections as $c) {
      var_dump((string)$c->attributes()->Name);
    }


    var_dump(count($this->connections));


//    var_dump(count($this->connections));
  }

  protected function getChildren($node, array $parentNames = null)
  {
//    var_dump((string)$node->attributes()->Name);
//    var_dump((string)$node->attributes()->Type);

    if ('Connection' === (string)$node->attributes()->Type) {
      $this->connections[] = $node;
//      var_dump(join(',', $parentNames), (string)$node->attributes()->Name);
      return;
    }

    $children = $node->children();

    foreach ($children as $childNode) {
      $attributes = $childNode->attributes();

      if ('Container' === (string)$attributes->Type) {
        $parentNames[] = (string)$attributes->Name;

//        return $this->getChildren($childNode->children(), $parentNames);
        $this->getChildren($childNode->children(), $parentNames);

        continue;
      }

//    var_dump($parentNames);
//      return $node;
    }


    $attributes = $node->attributes();

    if ('Container' === (string)$attributes->Type) {
      $parentNames[] = (string)$attributes->Name;

      return $this->getChildren($node->children(), $parentNames);
    }
//    var_dump($parentNames);
    return $node;
  }

//  protected function getElementFromNode($node)
//  {
//    $attributes = $node->attributes();
//
//    if ('container' === strtolower((string)$attributes['Type'])) {
//      $element = new Container($attributes);
//    } elseif ('connection' === strtolower((string)$attributes['Type'])) {
//      $element = new Connection($attributes);
//    }
//
//    return $element;
//  }

}
