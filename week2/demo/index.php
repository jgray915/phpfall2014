<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Week Two</title>
    </head>
    <body>
        
        <h1>Form</h1>
        <form action="#">
            Name: <input type="text" name="name" />
            <input type="submit" />
        </form>
        <?php
            $input = filter_input(INPUT_GET, "name");
            
            if($input == 1)
            {
                echo "<p>Entered a one.</p>";
            }
            else if($input == 2)
            {
                echo "<p>Entered a two.</p>";
            }
            else 
            {
                echo "<p>Did not enter a one or two.</p>";
            }
        ?>
    </body>
</html>
