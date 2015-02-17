<?php namespace MrShuttle\Input;

use MrShuttle\NodeObject\Connection;
use MrShuttle\NodeObject\Container;

class Parser
{
  private $xml;

  public function __construct($inputFile)
  {
    $this->xml = new \SimpleXMLElement(file_get_contents($inputFile));
  }

  public function getParsed()
  {
    foreach ($this->xml->children() as $node) {
      $connections = $this->getChildren($node);

      foreach ($connections as $connection) {
        var_dump((string)$connection->attributes()->Name);
      }
    }
  }

  protected function getChildren($node, array $parentNames = null)
  {
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
