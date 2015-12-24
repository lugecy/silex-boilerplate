<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('/', function(){
  return new Response(render_template('root.php', []));
});

$app->run();

//Helper
function render_template($path, $params)
{
  extract($params, EXTR_SKIP);
  ob_start();
  require __DIR__.'/../view/'.$path;
  $html = ob_get_clean();
  return $html;
}
