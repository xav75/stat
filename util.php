<?php
// $toto=$_SERVER['argv'][1];
//  ,SQLITE3_OPEN_READWRITE
// echo  $toto;

date_default_timezone_set('Europe/Paris');


spl_autoload_register(function ($class) {
$lower_class = strtolower($class);

$path        = dirname(__FILE__) . '\\Classes\\PHPExcel\\' . $lower_class . '.php';

if (file_exists($path)) require_once $path;
else {
$path = dirname(__FILE__) . '\\Classes\\PHPexcel\\' . $lower_class . '\\' . $lower_class . '.php';
if (file_exists($path)) require_once $path;


}
});

require_once 'Classes/dbsqlite.php';

error_reporting(E_ALL);
$periode='201501';

define('sqlite_path', "d:/calibre/metadata.db");



$db       = db::getInstance();

$sql    ="select *  from books";
$db     = db::getInstance();
$linesEntete  = $db->getLine($sql);

echo  $linesEntete['title'].'\n'."<br/>";
//var_dump($linesEntete);

$sql    ="select *  from books";
$db     = db::getInstance();
$linesEntete  = $db->getLines($sql);

$db       = db::getInstance();

echo  $linesEntete[3]['title'];

$sql    ="select *  from authors";

$linesEntete  = $db->getDict($sql,'name');
var_dump($linesEntete);

$titre='Iliade Edition  Francaise';
//$modif=$db->escape($titre);
//var_dump($modif);

$sql   ="update authors  SET name='bravo11'  where id=4" ;
$maj=$db->query($sql);



