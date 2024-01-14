<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $userSearch = $_POST["usersearch"];

try{ 
    require_once("includes/dbh-inc.php");
    $query = "SELECT * FROM users WHERE username = :usrSearch;";
    $stmt = $pdo ->prepare($query);
    $stmt -> bindParam(":usrSearch", $userSearch);

    $stmt -> execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;

   /* header("Location: ../index.php");*/

    //die();


}
catch(PDOException $e){
    die("Query failed: ". $e->getMessage());
}

}
else{
   // header("Location: ../index.php");
}

?>

<body>
    <h3>SEARCH RESULTS:</h3>

    <?php
    if(empty($results)){
        echo "<div>";
        echo "<p>TY LOGH</p>";
        echo "</div>";
    }
    else{
        foreach($results as $row){
            echo "<div>";
            echo htmlspecialchars($row["username"]);
            echo "</div>";
            echo "<div>";
            echo htmlspecialchars($row["pwd"]);
            echo "</div>";
            echo "<div>";
            echo htmlspecialchars($row["created_at"]);
            echo "</div>";
    }}
    ?>
</body>