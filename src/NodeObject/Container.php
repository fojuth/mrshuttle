<?php
/**
 * Created by PhpStorm.
 * User: fen
 * Date: 17/02/15
 * Time: 21:34
 */

namespace MrShuttle\NodeObject;


class Container
{

  private $attributes;

  public function __construct($attributes)
  {
    ;
    $this->attributes = $attributes;
  }

  public function get($attributeName){
    return (string) $this->attributes[$attributeName];
  }

}
