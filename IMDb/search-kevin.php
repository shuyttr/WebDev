<?php 
include("top.html");
$db = new PDO("mysql:dbname=imdb;", "student", "student");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$first_name = $db->quote($_GET["firstname"]);
$first_name_no_quotes = $_GET["firstname"];
$last_name = $db->quote($_GET["lastname"]);
$last_name_no_quotes = $_GET["lastname"];

$the_real_actor_id = include 'common.php';
$rows = $db->query("SELECT name, year FROM movies m
                    JOIN roles r ON r.movie_id = m.id
                    JOIN roles kevin_r ON kevin_r.movie_id = m.id
                    JOIN actors a ON a.id = r.actor_id
                    JOIN actors kevin_a ON kevin_a.id = kevin_r.actor_id
                    WHERE a.id = $the_real_actor_id
                        AND kevin_a.id = 22591
                    ORDER BY year DESC, name");
$i = 1;

if($rows->rowCount() <= 0) {
    echo "<p>$first_name_no_quotes $last_name_no_quotes wasn't in any films with kevin bacon</p>";
} else{
    ?>
        <h1>Results for <?= $first_name_no_quotes ?> <?= $last_name_no_quotes ?></h1>
        <table class="center">
        <caption>Films with <?=$first_name_no_quotes?> <?=$last_name_no_quotes?> and Kevin Bacon</caption>
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