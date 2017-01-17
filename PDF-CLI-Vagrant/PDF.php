<?php
session_start();

$servername = 'localhost';
$serveruser = 'root';
$serverpass = 'rootpass';
$dbname = 'Test';

$conn = new mysqli($servername, $serveruser, $serverpass, $dbname);

if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
}
$sql = "select * from users";
$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>PDF-CSV</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
    <h1>Version 1</h1>
</header>

<div class="datagrid">
    <table>
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>User ID</th>
            <th>PDF/CSV</th>
        </tr>
        </thead>

        <tbody>

        <?php
        foreach($result as $out){
            echo "<tr>";
            echo "<td>" . $out["firstname"] . "</td>";
            echo "<td>" . $out["lastname"] . "</td>";
            echo "<td>" . $out["age"] . "</td>";
            echo "<td>" . $out["id"] . "</td>";
            echo "<td>";
            echo '<a href="savepdf.php?id='. $out['id']. '">';
            echo "Save</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>