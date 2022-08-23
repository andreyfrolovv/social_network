<?php

require_once 'header.php';

echo <<<_END
    <script>
      function checkUser(user) {
         if (user.value == '') {
             $('#used').html('&nbsp;')
             return
         }
         
         $.post
         (
             'chekuser.php',
             { user: user.value}
             function(data) {
                 $('#used').html(data)
             }
         )
      }
    </script>
_END;

$error = $user = $pass = '';
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST)) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
        $error = "Not all friends were entered <br><br>";
    else {
        $result = queryMysql("select * from members where user = '$user'");

        if ($result->num_rows)
            $error = 'That username already<br><br>';
        else {
            queryMysql("insert into members values ('$user','$pass')");
            die('<h4>Account create</h4>Please log in.</div></body></html>');
        }
    }
}

echo <<<_END
    <form method="post" action="signup.php">$error
    <div data-role="fieldcontain">
     <label></label>
      please enter your details to sing up
    </div>
    <div data-role="fieldcontain">
      <label>Username</label>
      <input type="text" maxlength="16" name="user" value="$user"
        onblur="checkUser(this)">
      <label></label><div id="used">#used;</div>
    </div>
    
_END;

