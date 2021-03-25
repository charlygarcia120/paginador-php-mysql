<?php
    print('INSERT INTO tabla1 (id, nombre) VALUES '."\n");
    for($i=1;$i<=1000;$i++)
    {
        
        print("(".$i.", '".chr(rand(65, 90)).chr(rand(65, 90)).chr(rand(65, 90)).chr(rand(65, 90))."'),"."\n");    
    }

?>

