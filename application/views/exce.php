<?php
download_equote_excell();
function download_equote_excell()
 {
 	 $conn=mysql_connect("localhost","root","");
	 mysql_select_db("cca",$conn);
	 $query = "select * from franchisee";
	 $header = '';
		$data ='';
 		$export = mysql_query($query ) or die(mysql_error()); 		
 
		// extract the field names for header
 
		while ($fieldinfo=mysql_fetch_field($export))
		{
			$header .= $fieldinfo->name."\t";
		}

		while( $row = mysql_fetch_row( $export ) )
		{
    		$line = '';
    		foreach( $row as $value )
    		{                                            
        		if ( ( !isset( $value ) ) || ( $value == "" ) )
       		    {
            		$value = "\t";
       			 }
        		else
        		{
            		$value = str_replace( '"' , '""' , $value );
          		    $value = '"' . $value . '"' . "\t";
        		}
       		    $line .= $value;
    		}
    		$data .= trim( $line ) . "\n";
		}
		$data = str_replace( "\r" , "" , $data );
 
		if ( $data == "" )
		{
    		$data = "\nNo Record(s) Found!\n";                        
		}

		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=CCA-INDIA.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$data";
 

	 }
 
?>