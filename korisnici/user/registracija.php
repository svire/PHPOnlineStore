<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/stil1.css">
        <script type="text/javascript">
            function forma() {
                var user = document.getElementById('username').value.trim();
                var pass = document.getElementById('pass').value.trim();
                var jmbg = document.getElementById('jmbg').value.trim();
                var msg = document.getElementById('infoMsg');
                var firstname = document.getElementById('firstname').value.trim();
                var lastname = document.getElementById('lastname').value.trim();
                var address = document.getElementById('address').value.trim();
                if (firstname == '') {
                    document.getElementById('firstname').focus();
                    msg.innerHTML = 'Unesite ime!';
                    return false
                }
                if (!/^[a-zA-ZŠĐŽČĆšđžčć]+$/.test(firstname)) {
                    document.getElementById('firstname').focus();
                    msg.innerHTML = 'Samo slova mogu biti u imenu!';
                    return false
                }
                if (lastname == '') {
                    document.getElementById('lastname').focus();
                    msg.innerHTML = 'Unesite prezime!';
                    return false
                }
                if (!/^[a-zA-ZŠĐŽČĆšđžčć]+$/.test(lastname)) {
                    document.getElementById('lastname').focus();
                    msg.innerHTML = 'Samo slova mogu biti u prezimenu!';
                    return false
                }
                if (jmbg == '') {
                    document.getElementById('jmbg').focus();
                    msg.innerHTML = 'Unesite jmbg!';
                    return false
                }
                if (!/^[0-9]+$/.test(jmbg)) {
                    document.getElementById('jmbg').focus();
                    msg.innerHTML = 'Samo brojevi mogu biti u JMBG!';
                    return false
                }
                if (jmbg.length != 13) {
                    document.getElementById('jmbg').focus();
                    msg.innerHTML = 'JMBG mora imati 13 cifara!';
                    return false
                }
                if (address == '') {
                    document.getElementById('address').focus();
                    msg.innerHTML = 'Unesite adresu!';
                    return false
                }
                if (user == '') {
                    document.getElementById('username').focus();
                    msg.innerHTML = 'Unesite korisničko ime!';
                    return false
                }
                if (user.length > 8 || user.length < 6) {
                    document.getElementById('username').focus();
                    msg.innerHTML = 'Username mora biti izmedju 6 i 8 karaktera!';
                    return false
                }
                if (pass == '') {
                    document.getElementById('pass').focus();
                    msg.innerHTML = 'Unesite lozinku!';
                    return false
                }
                return true
            }
        </script>   

    </head>

    <body>
        <!--korisnici dodaj korisnika baza iz slika -->
        <div class="baner">
            <a href="pocetna.php"><img src="../../slike/baner2.png" border="0" alt="slika" title="slika"></a>
        </div>
        <ul class="bar" id="navbar">
            <li><a href="../../pocetna.php">Pocetna</a></li>
            <li><a href="../../pretraga.php">Pretraga</a></li>
            <li><a href="../../pretraga_kategorija.php">Kategorija</a></li>
        </ul>

        <h1 align="center">Unos novog kupca </h1>  
        <?php
        if (isset($_GET['msg'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['msg'] . "</h3>";
        }
        if (isset($_GET['message'])) {
            echo "<h3 style='text-align:center;'>" . $_GET['message'] . "</h3>";
        }
        ?>
        <div id="infoMsg" style="text-align: center;font-size: 18px;color:red;"></div>
        <form method="post" action="registracija_baza.php" onsubmit="return forma()">
            <table  class="tabla" width="31%" border="2" align="center" cellpadding="7" cellspacing="7">
                <tr>
                    <td colspan="2" class="red"><font size="+1">*obavezan unos</font></td>
                </tr>
                <tr>
                    <td align="right"><font size="4">Ime*</font></td>
                    <td><input maxlength="15" type="text" name="firstname" id="firstname"/></td>
                </tr>
                <tr>
                    <td align="right"><font size="4">Prezime*</font></td>
                    <td><input maxlength="20" type="text" name="lastname" id="lastname"/></td>
                </tr>
                <tr>
                    <td align="right"><font size="4">Email*</font></td>
                    <td><input type="email" name="email" id="email" required/></td>
                </tr>
                <tr>
                <tr>
                    <td align="right"><font size="4">JMBG*</font></td>
                    <td><input maxlength="13" type="text" name="jmbg" id="jmbg"/></td>
                </tr>
                <tr>
                    <td align="right"><font size="4">Adresa*</font></td>
                    <td><input maxlength="30" type="text" name="address" id="address"/></td>
                </tr>
                <tr>
                    <td align="right"><font size="4">Korisničko ime (6-8 karakt.)*</font></td>
                    <td><input maxlength="10" type="text" name="username" id="username"/></td>
                </tr>
                <tr>
                    <td align="right"><font size="4">Password*</font></td>
                    <td><input maxlength="10" type="password" name="pass" id="pass"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" name="submit" id="submit" value="Dodaj"/>
                        <input type="reset" name="reset" id="reset" value="Reset"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

