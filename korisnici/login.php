<?php
if (isset($_SESSION['korisnik'])) {
    session_start();
    header('Location: logout.php');
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <style>  
        </style>  
        <script>
            function forma() {
                var user = document.getElementById('username');
                var pass = document.getElementById('pass');
                var msg = document.getElementById('poruka');
                var msg2 = document.getElementById('poruka1');
                var msg3 = document.getElementById('poruka2');
                if (user.value.trim() == '') {
                    user.focus();
                    user.classList.add("input_warning")
                    msg2.innerHTML = '! Enter your email or mobile phone number!';
                    return false
                } else {
                    msg2.innerHTML = ""
                    user.classList.remove("input_warning")
                }
                if (pass.value.trim() == '') {
                    pass.focus();
                    pass.classList.add("input_warning")
                    msg3.innerHTML = '! Enter your password!';
                    return false
                } else {
                    msg3.innerHTML = '';
                    pass.classList.remove("input_warning")
                }
                return true
            }
        </script>
    </head>
    <body>
<?php
include "../header.php"
?>


        <form method="post" action="login_valid.php" onsubmit="return forma()" >
            <div class='SignIn'>
                <h1>Sign-In</h1>
                <div class="TextInputs">
                    <label style="color:#000;" class="Label">Username</label>
                    <input class="InputField" name="username" id="username" type='text'></input>
                </div>
                <div class="InputError" id="poruka1">
<?php
if (isset($_GET['greskaPoruka'])) {
    echo $_GET['greskaPoruka'];
}
if (isset($_GET['message'])) {
    echo "<h3 style='text-align:center;color:navy;'>" . $_GET['message'] . "</h3>";
}
?>     
                </div>
                <div class="TextInputs">
                    <label style="color:#000;" class="Label">Password</label>
                    <input class="InputField" type="password" name="pass" id="pass"></input>
                </div>
                <div class="InputError" id="poruka2"> </div>
                <input class="Button" type="submit" name="submit" id="submit" value="Login"/>

                <p>
                    By continuing, you agree to our
                    <span class='Blue'>Conditions of Use </span>
                    and <span className='Blue'> Privacy Notice</span>.
                </p>
                <span class='Blue Help'>Need help?</span>
            </div>
        </form>
    </body>
</html>




