<?php
// $toto=$_SERVER['argv'][1];

// echo  $toto;

date_default_timezone_set('Europe/Paris');


spl_autoload_register(function ($class) {
    $lower_class = strtolower($class);
    $path        = dirname(__FILE__) . '/classes/' . $lower_class . '.php';
    if (file_exists($path)) require_once $path;
    else {
        $path = dirname(__FILE__) . '/classes/' . $lower_class . '/' . $lower_class . '.php';
        if (file_exists($path)) require_once $path;
    }
});
require_once 'classes/PHPExcel/IOFactory.php';
$inputFileType = PHPExcel_IOFactory::identify('test.xlsx');

                $objReader = PHPExcel_IOFactory::createReader($inputFileType);  

                $objReader->setReadDataOnly(true);

                /**  Load $inputFileName to a PHPExcel Object  **/  
                $objPHPExcel = $objReader->load('test.xlsx');

                $total_sheets=$objPHPExcel->getSheetCount(); 

                $allSheetName=$objPHPExcel->getSheetNames(); 
                $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); 
                $highestRow = $objWorksheet->getHighestRow(); 
                $highestColumn = $objWorksheet->getHighestColumn();  
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  
                for ($row = 1; $row <= $highestRow;++$row) 
                {  
                    for ($col = 0; $col <$highestColumnIndex;++$col)
                    {  
                        $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  

                              $arraydata[$row-1][$col]=$value; 


                    }  

                }



        print_r($arraydata);
unset ($objPHPExcel);
 /**   version  2

                inputFileType = PHPExcel_IOFactory::identify('test.xlsx');

                $objReader = PHPExcel_IOFactory::createReader($inputFileType);  

                $objReader->setReadDataOnly(true);

                /**  Load $inputFileName to a PHPExcel Object  **/  
                $objPHPExcel = $objReader->load('test.xlsx');


	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
    echo "<br>The worksheet ".$worksheetTitle." has ";
    echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
    echo ' and ' . $highestRow . ' row.';
    echo '<br>Data: <table border="1"><tr>';
    for ($row = 1; $row <= $highestRow; ++ $row) {
        echo '<tr>';
        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
            echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}


unset ($objPHPExcel);




		
	


?>


