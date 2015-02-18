<?php namespace MrShuttle\Input;

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
    $this->fetchConnections($this->xml);

    return $this->connections;
  }

  protected function fetchConnections($node)
  {
    if ('Connection' === (string)$node->attributes()->Type) {
      $this->connections[] = $node;
    }

    foreach ($node->children() as $childNode) {
      $this->fetchConnections($childNode);
    }
  }

}
