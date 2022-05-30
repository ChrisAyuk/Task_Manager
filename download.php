



<?php


 $con = mysqli_connect('localhost','root','');
   
 mysqli_select_db($con, 'task');
 
 $result = "SELECT * FROM eventdata";

 $export = mysqli_query ( $con, $result ) or die ( "Sql error : " . mysqli_error( ) );

$fields = mysqli_num_fields ( $export );

for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysqli_field_name( $export , $i ) . "\t";
}

while( $row = mysqli_fetch_row( $export ) )
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
    $data = "\n(0) Records Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Task.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";




?>