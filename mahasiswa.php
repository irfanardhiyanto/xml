<?php
$host = 'localhost';
  $user = 'root';      
  $password = '';      
  $database = 'unisbank';  
    
  $konek_db = mysql_connect($host, $user, $password);    
  $find_db = mysql_select_db($database) ;
?>

<center> 
MENAMPILKAN DATA MAHASISWA 
<br>
<br>
<table  border='1' Width='800'>  
<tr>
    <th> NIM </th>
    <th> Nama </th>
    <th> Alamat </th>
    <th> Program Studi </th>
    
</tr>

<?php  
$queri="Select * From mahasiswa" ;

$hasil=MySQL_query ($queri);

while ($data = mysql_fetch_array ($hasil)){
$id = $data['nim'];
 echo "    
        <tr>
        <td>".$data['nim']."</td>
        <td>".$data['nama']."</td>
        <td>".$data['alamat']."</td>
        <td>".$data['progdi']."</td>
        
        </tr> 
        ";

		$datas = array();
		$datas [] = array(
		'nim' => $data['nim'],
		'nama' => $data['nama'],
		'alamat' => $data['alamat'],
		'progdi' => $data['progdi']
		);
        
}

$doc = new DOMDocument();
$doc->formatOutput = true;
 
$r = $doc->createElement( "datas" );
$doc->appendChild( $r );
 
foreach( $datas as $data )
{
$b = $doc->createElement( "data" );
 
$nim = $doc->createElement( "nim" );
$nim->appendChild(
$doc->createTextNode( $data['nim'] )
);
$b->appendChild( $nim );
 
$nama = $doc->createElement( "nama" );
$nama->appendChild(
$doc->createTextNode( $data['nama'] )
);
$b->appendChild( $nama );
 
$alamat = $doc->createElement( "alamat" );
$alamat->appendChild(
$doc->createTextNode( $data['alamat'] )
);
$b->appendChild( $alamat );

$progdi = $doc->createElement( "progdi" );
$progdi->appendChild(
$doc->createTextNode( $data['progdi'] )
);
$b->appendChild( $progdi );
 
$r->appendChild( $b );
}
 
//echo $doc->saveXML();
$doc->save("data_mahasiswa.xml");

?>

</table>