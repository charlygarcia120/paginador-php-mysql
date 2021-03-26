<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
    $posicion=$_GET["pos"];					
    $records_per_page=10;
    
    //we need to know how many records
    $bd="test";
    $servidor="localhost";
    $puerto="3306";   	
    $link = mysqli_connect("$servidor:$puerto","root","") or die("No pudo conectarse a $servidor!!!!" . mysqli_error());;
    mysqli_select_db($link,"test") or die("No pudo seleccionarse la BD $bd.");;					
    $resultado = mysqli_query($link,"select * from tabla1");					
    $num_rows = mysqli_num_rows($resultado);  // num of rows in total
    mysqli_free_result($resultado);
    mysqli_close($link);




    //we need to show the records
    $bd="test";
    $servidor="localhost";
    $puerto="3306";   	
    $link = mysqli_connect("$servidor:$puerto","root","") or die("No pudo conectarse a $servidor!!!!" . mysqli_error());;
    mysqli_select_db($link,"test") or die("No pudo seleccionarse la BD $bd.");;
    
    $resultado = mysqli_query($link,"select * from tabla1  order by id limit $posicion,10");  //num of rows to show 
    while($row=mysqli_fetch_array($resultado))
    {
        print(' '.$row[0].'  '.$row[1].' <br>');        
    }	                    
    mysqli_free_result($resultado);
    mysqli_close($link);					
    $numhojas=$num_rows/$records_per_page;
    
                        
    
    
    print("<h3>Position is $posicion</h3>");
    print("<h3>records in DB: $num_rows:  Number of pages $numhojas</h3>");
    

    //and now we need to show the pagination    
    for($i=1;$i<=$numhojas;$i++)						
    {               
        print("<a href='buscar.php?pos=".(10*($i-1))."'>pagina $i </a> | ");        
    }
?>
               
                
</body>

</html>