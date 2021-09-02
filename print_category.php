<?php
	function generateRow(){
		$contents = '';
		include_once('config.php');
		$id=$_GET['y'];
		$sql = "SELECT * FROM spot_category join spots on spot_category.spot_id=spots.spot_id join category on spot_category.cat_id=category.cat_id join types on spot_category.type_id=types.type_id  where spot_category.cat_id=".$id;

		//use for MySQLi OOP
		$query = $dbconnect->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
					<td>".$row['spot']."</td>
						<td>".$row['category']."</td>
					
					<td>".$row['type']."</td>
			</tr>
			";
		}
		////////////////

		//use for MySQLi Procedural
		// $query = mysqli_query($conn, $sql);
		// while($row = mysqli_fetch_assoc($query)){
		// 	$contents .= "
		// 	<tr>
		// 		<td>".$row['id']."</td>
		// 		<td>".$row['firstname']."</td>
		// 		<td>".$row['lastname']."</td>
		// 		<td>".$row['address']."</td>
		// 	</tr>
		// 	";
		// }
		////////////////
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">Cagayan Tourist Spot Information</h2>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                
				<th width="30%">Spot Name</th>
				<th width="30%">Category</th>
				<th width="30%">Type</th>
		
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('members.pdf', 'I');
	

?>