<?php
    
    $alamat_website     = 'https://adiva.click';
    
    // Storing the elements of the webpage into an array
        $source_code2 = file($alamat_website);
        $source_code3 = strtolower($source_code2);

    // 1. traversing through each element of the array
    // 2.printing their subsequent HTML entities
    foreach ($source_code2 as $line_number => $last_line) {
        $source_code = nl2br(htmlspecialchars($last_line) . "\n");
        
        echo $source_code ;
    }

?>