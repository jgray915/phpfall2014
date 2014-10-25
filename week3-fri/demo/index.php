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
        // put your code here
        
        $id = filter_input(INPUT_GET, 'id');
        $username = filter_input(INPUT_GET, 'username');
        $db = new PDO(Config::DB_DNS, Config::DB_USER, Config::DB_PASSWORD);

        $dbs = $db->prepare('select * from signup where id = :id or username = :username limit 1');
        //$dbs = $db->prepare('insert into signup set email = :email, username = :username, password = :password');
        $dbs->bindParam(':id', $id, PDO::PARAM_INT);
        $dbs->bindParam(':username', $username, PDO::PARAM_STR);

        $dbs->execute();
        
        
        if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                $isTaken = true;
            }
        
        /*
         * for one record use
         */
        $results = $dbs->fetch(PDO::FETCH_ASSOC);
         
        
        $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
        echo '<table border="1">'; 
        echo '<tr><th>Index</th><th>ID</th><th>Email</th>';
        echo '<th>username</th><th>password</th></tr>';
        foreach ($results as $key => $value) {
            echo '<tr>';
             echo '<td>', $key ,'</td>';
             echo '<td>', $value['id'] ,'</td>';
             echo '<td>', $value['email'] ,'</td>';
             echo '<td>', $value['username'] ,'</td>';
             echo '<td>', $value['password'] ,'</td>';          
            echo '</tr>';
        }
        echo '</table>';
        
        
        ?>
    </body>
</html>