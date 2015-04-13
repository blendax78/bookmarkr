<?php
require_once('site_config.php');

\Toro::serve(array(
  '/bookmarks' => 'Airwatch\Controllers\BookmarksController',
  '/bookmarks/:number' => 'Airwatch\Controllers\BookmarksController',
  '/' => 'Airwatch\Controllers\IndexController'
));