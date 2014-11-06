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
        
        <form action="#" method="post">
        
            <input type="radio" name="cars" value="chevy" <?php if($_POST["cars"] === "chevy"){echo "checked='checked'";} ?>/>chevy<br>
            <input type="radio" name="cars" value="ford" <?php if($_POST["cars"] === "ford"){echo "checked='checked'";} ?>/>ford<br>
            <input type="radio" name="cars" value="honda" <?php if($_POST["cars"] === "honda"){echo "checked='checked'";} ?>/>honda<br>
            
            <input type="submit" value="Submit" /><br>
        </form>
        <?php echo $_POST["cars"]; ?>
    </body>
</html>
