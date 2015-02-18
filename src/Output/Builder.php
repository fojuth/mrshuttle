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
      $path = $connection->getPath(1);

      $this->setPath($path, $hosts, $connection);
    }

    return $hosts;
  }

  protected function setPath($path, &$hosts, $connection){
    $h =& $hosts;
    foreach ($path as $p) {
      if (false === isset($h[$p])) {
        $h[$p] = array();
      }

      $h =& $h[$p];
    }

    $h[] = array(
      'name' => $connection->getName(),
      'cmd' => '???',
    );

    return $h;
  }

}
