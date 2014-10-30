<?php

function readUsers()
{
    global $db;
    $results = array();
    $dbs = $db->prepare('select * from users');
    
    if ( $dbs->execute()  && $dbs->rowCount() > 0)  
    {
        $results = $dbs->fetchALL(PDO::FETCH_ASSOC);
    }
    return $results;
}

function readUser($id)
{
    global $db;
    $results = array();
    
    $dbs = $db->prepare('select * from users where id = :id');
    $dbs->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ( $dbs->execute()  && $dbs->rowCount() > 0)  
    {
        $results = $dbs->fetch(PDO::FETCH_ASSOC);
    }
    return $results;
}