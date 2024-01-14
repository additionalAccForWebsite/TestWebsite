<?php 
require_once("includes/config.php");
require_once("includes/signup_view-inc.php");
require_once("includes/login_view-inc.php");
?>

<head>
<link rel="stylesheet" href="css/anim.css">
</head>
 <body>



 <h1>SIGNUP PAGE
 </h1>
 <h3>
 <?php
OutputUsername();
?>
 </h3>

<?php if(!isset($_SESSION["user_id"])){?>
        <h3>LOGIN</h3>
        <form action="includes/login-inc.php" method="post">
        <?php 
                LoginInput();
            ?>
            <button>LOGIN</button>
            </form>
    <?php } ?>



<?php
CheckLoginErrors();
?>

<h3>SIGNUP</h3>
<form action="includes/signup-inc.php" method="post">
    <?php 
        SignupInput();
    ?>
    <button>SIGNUP</button>
</form>

<?php
CheckSignupErrors();
?>


    <h3>LOGOUT</h3>
<form action="includes/logout-inc.php" method="post">
    <button>LOGOUT</button>
    </form>

    <form method="post" action="send_script.php">
    NAME: <input type="text" name="username" placeholder="Name">
  email: <input type="email" name="email" placeholder="Email"> <br />
  Subject: <input type="text" name="subject" placeholder="Subject"> <br />
  Message: <textarea name="msg" rows="15" cols="150" placeholder="Write your message here"></textarea> <br />
  <button type="submit" name="send_message_btn">Send</button>
</form>

</body>