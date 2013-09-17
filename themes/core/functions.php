<?php
/**
* Helpers for the template file.
*/


$lt->data['header'] = '<h1>Header: Latte</h1>';
$lt->data['footer'] = '<p>Footer: &copy; Latte by Andreas Carlsson (<a href="mailto:andreasc89@gmail.com">andreasc89@gmail.com</a>)</p>';



/**
* Print debuginformation from the framework.
*/
function get_debug() {
  $lt = CLatte::Instance();
  $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($lt->config, true)) . "</pre>";
  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($lt->data, true)) . "</pre>";
  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($lt->request, true)) . "</pre>";
  return $html;
}