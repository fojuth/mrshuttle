<?php namespace MrShuttle\Output;

class Builder
{

  /**
   * @var array
   */
  private $connections;

  public function __construct(array $connections)
  {
    $this->connections = $connections;
  }

  public function getHosts()
  {
    $hosts = array();

    foreach ($this->connections as $connection) {
      $path = $connection->getPath(3);

      $this->setPath($path, $hosts, $connection);
    }

    return $hosts;
  }

  protected function setPath($path, &$hosts, $connection){
    $fullPath = array_merge($path, array($connection->getName()));

    $hosts[] = array(
      'name' => join(' / ', $fullPath),
      'cmd' => $connection->getCommand(),
    );

    return $hosts;
  }

}
