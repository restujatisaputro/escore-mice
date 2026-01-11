<?php
    
    $alamat_website     = $_POST['alamat_website'];
    $source_code_input  = $_POST['source_code'];
    $inputer            = $_POST['inputer'];


    $host = "localhost";
    $user = "rest6794_imam";
    $password = "R3m3mb3rm3!";
    $database = "rest6794_imam";
	// $conn = new mysqli($servername, $username, $password, $dbname);
    $connect=mysqli_connect("$host", "$user", "$password", "$database");
	// Check if the connection was successful

    $data = mysqli_query($connect, "select * from tb_website where alamat_website = '$alamat_website' ");
		while($result = mysqli_fetch_array($data)){
			$id_website = $result["id_website"];	
		}
	
	// SQL insert query
	$sql = "DELETE FROM tb_analisakeyword WHERE id_website = $id_website;";
	// Attempt to execute the query
	if ($connect->query($sql) === TRUE) {
	    echo "Data saved successfully!";
	} else {
	    // If the query failed, show an error message
	    echo "Error: " . $connect->error;
	}

    $filter = array(".",",","!","?","(",")","-","_");
	$filter_source_code = str_replace($filter, "", $source_code_input);
    $source_code = strtolower($filter_source_code);
    
    for ($i=1; $i <= 34; $i++) { 

    $data1= mysqli_query($connect,"select * from tb_indikator where no_indikator=$i and kelompok='GREEN D WEB VARIABLES'");		
	while($result1 = mysqli_fetch_array($data1)){	
	$indikator1 = $result1['indikator'];	
	$indikatorR = explode(", ", $indikator1);
	$found = 0; // Initialize to 0 (false)
	$hasil = 0;
	// Loop through each keyword and check if it exists in the sentence
	foreach ($indikatorR as $keyword) {
	    if (strpos($filter_source_code, $keyword) !== false) {
	        $found = 1; // Set to 1 (true) if a keyword is found
	        $hasil = $hasil+1;
	        break; // Exit the loop if a keyword is found
	    }
	}
	// Output the result (1 if keyword found, otherwise 0)
	$input = 0;
	if ($hasil>0) {
		$input = 1;
	}
	}

	// SQL insert query
	$sql = "INSERT INTO tb_analisakeyword ( id_website, alamat_website, id_indikator, indikator, nilai_indikator, kelompok, inputer) VALUES ('$id_website', '$alamat_website', '$i', '$i', '$input', 'GREEN D WEB VARIABLES', '$inputer' )";
	// Attempt to execute the query
	if ($connect->query($sql) === TRUE) {
	    echo "Data saved successfully!";
	} else {
	    // If the query failed, show an error message
	    echo "Error: " . $connect->error;
	}

    }

    for ($i=1; $i <= 28; $i++) { 
    	echo $i;

    $id_indi = $i+34;
    $data1= mysqli_query($connect,"select * from tb_indikator where no_indikator=$i and kelompok='MICE or CVB'");		
	while($result1 = mysqli_fetch_array($data1)){	
	$indikator1 = $result1['indikator'];	
	$indikatorR = explode(", ", $indikator1);

	// Flag to indicate if any keyword is found
	$found = 0; // Initialize to 0 (false)
	$hasil = 0;
	// Loop through each keyword and check if it exists in the sentence
	foreach ($indikatorR as $keyword) {
	    if (strpos($filter_source_code, $keyword) !== false) {
	        $found = 1; // Set to 1 (true) if a keyword is found
	        $hasil = $hasil+1;
	        break; // Exit the loop if a keyword is found
	    }
	}
	// Output the result (1 if keyword found, otherwise 0)
	$input = 0;
	if ($hasil>0) {
		$input = 1;
	}
	  
	}


	// SQL insert query
	$sql = "INSERT INTO tb_analisakeyword ( id_website, alamat_website, id_indikator, indikator, nilai_indikator, kelompok, inputer) VALUES ('$id_website', '$alamat_website', '$id_indi', '$i', '$input', 'MICE or CVB', '$inputer' )";
	// Attempt to execute the query
	if ($connect->query($sql) === TRUE) {
	    echo "Data saved successfully!";
	} else {
	    // If the query failed, show an error message
	    echo "Error: " . $connect->error;
	}

    }       	

  // die;
?>

<script type="text/javascript">
    window.location.replace("https://imam.restujati.com/website/read/<?php echo $id_website ; ?>");
</script>

    
