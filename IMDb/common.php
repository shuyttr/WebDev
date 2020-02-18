<?php
#This file is used to extract an id from an Actor
#If there is more than one actor for a given name, this 
#query will return the actor (id) which appears in the most amount of movies
$db = new PDO("mysql:dbname=imdb;", "student", "student");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$first_name = $_GET["firstname"];
$last_name = $db->quote($_GET["lastname"]);
$first_two_letters = substr($first_name, 0, 2);//only the first two letters have to match
$actor = $db->query("SELECT id FROM actors a
                    WHERE a.last_name = $last_name
                        AND a.first_name LIKE '".$first_two_letters."%'
                    ORDER BY film_count DESC");
if($actor->rowCount() <= 0){
    return 0;
}
$result = $actor->fetch(PDO::FETCH_NUM);
return $result[0];
?>