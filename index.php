<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            
            $d = dir(".");
            
            while (false !== ($f = $d->read())) 
            {
                if(strpos($f,"week") !== false){
                    echo "<p><a href='./".$f."'>".$f."</a></p>";
                }
            }
             
            phpinfo();
        ?>
    </body>
</html>
