<?php
$dni=$_POST["dni"];
if(strlen($dni)<8 || strlen($dni)>8)
{
    $prueba=1;
}
else{
        $prueba=file_get_contents('https://api.apis.net.pe/v1/dni?numero='.$dni.'');
}
echo $prueba;

/*



$dni=$_POST["dni"];


if(strlen($dni)<8 || strlen($dni)>8)
{
    $prueba=1;
}
else{
    
    

   
        $prueba=file_get_contents('https://api.apis.net.pe/v1/dni?numero='.$dni.'');
   
  
}








echo $prueba;





*/
