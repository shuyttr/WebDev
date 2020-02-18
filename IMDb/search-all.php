<?php 
include("top.html");
$db = new PDO("mysql:dbname=imdb;", "student", "student");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$first_name = $db->quote($_GET["firstname"]);
$first_name_no_quotes = $_GET["firstname"];
$last_name = $db->quote($_GET["lastname"]);
$last_name_no_quotes = $_GET["lastname"];

$the_real_actor_id = include 'common.php';
if ($the_real_actor_id === 0){
    echo "<p>Actor $first_name_no_quotes $last_name_no_quotes isn't found</p>";
} else{
$rows = $db->query("SELECT name, year FROM movies m 
                    JOIN roles r ON m.id = r.movie_id 
                    JOIN actors a ON r.actor_id = a.id 
                    WHERE a.id = $the_real_actor_id
                    ORDER BY year DESC, name");
$i = 1;
    ?>
        <h1>Results for <?= $first_name_no_quotes ?> <?= $last_name_no_quotes ?></h1>
        <table class="center">
        <caption>All Films</caption>
        <tr><th>#</th><th>Title</th><th>Year</th></tr>
    <?php
        foreach($rows as $row){
        ?>
        <tr><td><?= $i ?></td><td><?= $row["name"] ?></td><td><?= $row["year"] ?></td></tr>
        <?php   
        $i++;
        }
    ?>
    
    </table>
<?php
}
?>
<?php include("bottom.html"); ?>