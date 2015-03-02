<?php namespace MrShuttle\Output;

class Template {

  protected $template = '
{
	"_comments": [
		"Valid terminals include: \'Terminal.app\' or \'iTerm\'",
		"Hosts will also be read from your ~/.ssh/config or /etc/ssh_config file, if available",
		"For more information on how to configure, please see http://fitztrev.github.io/shuttle/"
	],
	"terminal": "iTerm",
	"launch_at_login": false,
	"show_ssh_config_hosts": true,
	"ssh_config_ignore_hosts": [],
	"ssh_config_ignore_keywords": [],
	"hosts":
    __HOSTS__

}
';

  public function render($hosts){
    return preg_replace('/__HOSTS__/', $hosts, $this->template);
  }

}
