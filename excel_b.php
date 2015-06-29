<?php
//$toto=$_SERVER['argv'][1];

//cho  $toto  he he;

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
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Shared/String.php' ;

PHPExcel_Shared_String::setDecimalSeparator('.');
PHPExcel_Shared_String::setThousandsSeparator('');


$objet = PHPExcel_IOFactory::createReader('Excel5');
$excel = $objet->load('D:\php\lignage_2014_12_B.xls');




$writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
$writer->setSheetIndex(1);

$writer->setDelimiter(';');//l'op�rateur de s�paration est la virgule
$writer->setEnclosure('');


$writer->save("D:\php\lignage_ac.csv");


$writer->setSheetIndex(2);
$writer->setDelimiter(";");//l'op�rateur de s�paration est la virgule
$writer->setEnclosure("");

$writer->save("D:\php\lignage_gp.csv");


$writer->setSheetIndex(3);
$writer->setDelimiter(";");//l'op�rateur de s�paration est la virgule
$writer->setEnclosure("");

$writer->save("D:\php\lignage_ll.csv");


$writer->setSheetIndex(4);
$writer->setDelimiter(";");//l'op�rateur de s�paration est la virgule
$writer->setEnclosure("");

$writer->save("D:\php\lignage_pa.csv");

$writer->setSheetIndex(5);
$writer->setDelimiter(";");//l'op�rateur de s�paration est la virgule
$writer->setEnclosure("");

$writer->save("D:\php\lignage_qj.csv");


echo '<h1>fififi</h1>';
?>