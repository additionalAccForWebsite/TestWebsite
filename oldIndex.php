<?php 
require_once("config.php");
?>

<head>
<link rel="stylesheet" href="css/anim.css">
</head>
 <body>

 <h1>SIGNUP PAGE</h1>
 
 <form class="searchform" action="search.php" method = "post">
        <label for="search">Search for user:</label>
        <input id="search" type="text" name="usersearch"
        placeholder="Search...">
        <button>SEARCH</button>
    </form>


<h3>SIGNUP</h3>
<form action="includes/formhandler-inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="text" name="email" placeholder="Email">
    <button>SIGNUP</button>
</form>
<h3>CHANGE ACCOUNT</h3>
<form action="includes/userupdate-inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <input type="text" name="email" placeholder="Email">
    <button>CHANGE ACCOUNT</button>
</form>
<h3>DELETE</h3>
<form action="includes/userdelete-inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <button>DELETE</button>
    </form>
</br>





</body>