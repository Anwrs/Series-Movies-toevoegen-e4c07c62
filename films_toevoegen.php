<?php 
$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<a href="index.php">Terug</a>
<form action="films_toevoegen.php" method="post">
    <h1>Film toevoegen:</h1>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Titel-</h2><input type="text" name="title" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Duur-</h2><input type="text" name="duur" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Datum van uitkomst-</h2><input type="text" name="datum_van_uitkomst" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Land van uitkomst-</h2><input type="text" name="land_van_uitkomst" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Youtube Trailer id-</h2><input type="text" name="youtube_trailer_id" id=""></div><br>
    <div style="display: flex; align-items:center; height: 50px;"><h2>Omschrijving-</h2><textarea rows="4" cols="50" type="text" name="description" id=""></textarea></div><br>
    <button type="submit" name="submit">Toevoegen</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $duur = $_POST['duur'];
    $datum_van_uitkomst = $_POST['datum_van_uitkomst'];
    $land_van_uitkomst = $_POST['land_van_uitkomst'];
    $description = $_POST['description'];
    $youtube_trailer_id = $_POST['youtube_trailer_id'];

    $sql = "INSERT INTO movies(title, duur, datum_van_uitkomst, land_van_uitkomst, description, youtube_trailer_id) VALUES (?,?,?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$title, $duur, $datum_van_uitkomst, $land_van_uitkomst, $description, $youtube_trailer_id]);
}
?>