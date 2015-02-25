<?php
// $toto=$_SERVER['argv'][1];

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
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Shared/String.php' ;
//require_once 'Classes/db.php';
PHPExcel_Shared_String::setDecimalSeparator('.');
PHPExcel_Shared_String::setThousandsSeparator(' ');


error_reporting(E_ALL);
$periode='201501';

define('LOGIN', 'pajx');
define('PASSWORD', 'pakronos');
define('BASE', 'prod_jx15pr.world');


$annee='201501';

$inputFileType = PHPExcel_IOFactory::identify('etat001der.xls');
$excel2 = PHPExcel_IOFactory::createReader($inputFileType);

$excel2 = $excel2->load('etat001der.xls'); // Empty Sheet
$excel2->setActiveSheetIndex(1);






//  PAJX.PA_STAT_CUMUL_lignes_mt


$sql    ="SELECT PAJX.PA_STAT_CUMUL_MT.RGJX_CODE, PAJX.PA_STAT_CUMUL_MT.RGJX_CODE_EDIT,
  PAJX.PA_STAT_CUMUL_MT.JX_CODE, PAJX.PA_STAT_CUMUL_MT.JOURNALAF, PAJX.PA_STAT_CUMUL_MT.TOTALLINEA,
  PAJX.PA_STAT_CUMUL_MT.PARUTION, PAJX.PA_STAT_CUMUL_MT.ANNEE_ENCOURS,
  PAJX.PA_STAT_CUMUL_MT.TOTALLINEA_1, PAJX.PA_STAT_CUMUL_MT.PARUTION_1,
  PAJX.PA_STAT_CUMUL_MT.ANNEE_PREC, PAJX.PA_STAT_CUMUL_MT.TOTALLINEB,
  PAJX.PA_STAT_CUMUL_MT.TOTALLINEB_1, PAJX.CUMUL_TOTAL.CM1, PAJX.CUMUL_TOTAL.CM2,
  PAJX.CUMUL_TOTAL.CA1, PAJX.CUMUL_TOTAL.CA2
  FROM PAJX.PA_STAT_CUMUL_MT, PAJX.CUMUL_TOTAL
  GROUP BY PAJX.PA_STAT_CUMUL_MT.RGJX_CODE, PAJX.PA_STAT_CUMUL_MT.RGJX_CODE_EDIT,
    PAJX.PA_STAT_CUMUL_MT.JX_CODE, PAJX.PA_STAT_CUMUL_MT.JOURNALAF,
    PAJX.PA_STAT_CUMUL_MT.TOTALLINEA, PAJX.PA_STAT_CUMUL_MT.PARUTION,
    PAJX.PA_STAT_CUMUL_MT.ANNEE_ENCOURS, PAJX.PA_STAT_CUMUL_MT.TOTALLINEA_1,
    PAJX.PA_STAT_CUMUL_MT.PARUTION_1, PAJX.PA_STAT_CUMUL_MT.ANNEE_PREC,
    PAJX.PA_STAT_CUMUL_MT.TOTALLINEB, PAJX.PA_STAT_CUMUL_MT.TOTALLINEB_1,
    PAJX.CUMUL_TOTAL.CM1, PAJX.CUMUL_TOTAL.CM2, PAJX.CUMUL_TOTAL.CA1,
    PAJX.CUMUL_TOTAL.CA2
  ORDER BY PAJX.PA_STAT_CUMUL_MT.RGJX_CODE, PAJX.PA_STAT_CUMUL_MT.RGJX_CODE_EDIT, PAJX.PA_STAT_CUMUL_MT.JX_CODE";
//$db     = db::getInstance();
//$lines  = $db->getLines($sql);

//

//var_dump($lines);



// [10]=>
// array(16) {
//   ["rgjx_code"]=>
//   string(1) "4"
//   ["rgjx_code_edit"]=>
//   string(2) "65"
//   ["jx_code"]=>
//   string(1) "6"
//   ["journalaf"]=>
//   string(18) "Affiche Parisien
//   ["totallinea"]=>
//   string(5) "82239"
//   ["parution"]=>
//   string(1) "9"
//   ["annee_encours"]=>
//   string(6) "201501"
//   ["totallinea_1"]=>
//   string(5) "85430"
//   ["parution_1"]=>
//   string(1) "9"
//   ["annee_prec"]=>
//   string(6) "201401"
//   ["totallineb"]=>
//   string(6) "925933"
//   ["totallineb_1"]=>
//   string(6) "872411"
//   ["cm1"]=>
//   string(6) "459927"
//   ["cm2"]=>
//   string(6) "403757"
//   ["ca1"]=>
//   string(7) "5280069"
//   ["ca2"]=>
//   string(7) "4904233"



// titre de l'etat
$i = '2';
$excel2->getactivesheet()
    ->setcellvalue('D'.$i,'Situation g�n�rale de la concurrence Total tableau 1'  );



//   entete  de l'etat

$i = '4';
$excel2->getactivesheet()
    ->setcellvalue('D'.$i,'Lignage du mois'  )
    ->setcellvalue('I'.$i,'Lignage sur douze mois mobiles');



$i='5';


$i = 7;
$grpa=-1;
$alpha='C';
while ($grpa < 4) {
    $i++;
    $grpa++;

    $parution= 1020;
    $parution_1= 100 ;
    if ( $parution > $parution_1)
    {  $nb="(C)"; }

    if ( $parution == $parution_1)
    {  $nb="(A)"; }

    if ( $parution < $parution_1)
    {  $nb="(B)"; }


//$excel2->getactivesheet()->setcellvalue('a'.$i,$lines[$grpa]['concurrence'] )
    $excel2->getactivesheet()
        ->setcellvalue('c70',$nb  )
        ->setcellvalue('d70',100   )
        ->setcellvalue('e70',300 )
        ->setcellvalue('i70',13000  )
        ->setcellvalue('j70',10500);


}



//  format
PHPExcel_Shared_String::setDecimalSeparator('.');
PHPExcel_Shared_String::setThousandsSeparator(' ');




$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel5');
$excel2->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$excel2->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$excel2->getActiveSheet()->getPageSetup()->setFitToPage(true);
$excel2->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$excel2->getActiveSheet()->getPageSetup()->setFitToHeight(1);
$excel2->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
$excel2->getActiveSheet()->getPageSetup()->setVerticalCentered(true);






$objWriter->save('sortieder.xls');



?>