<?php
/**
 * Created by PhpStorm.
 * User: ming
 * Date: 17-4-26
 * Time: 下午3:55
 */

$opts = getopt( '', [ 'schema:', 'action:' ] );

require './schemas/'.ucfirst($opts['schema']).'.php';

$class = ucfirst($opts['schema']);
$action = $opts['action'];

$schema = new $class;
$schema->$action();