<form method="post" action="#">
Password: <input type="password" name="password" />
<input type="submit" value="Genereer" />
</form>

<?php 
if(isset($_POST['password'])) {
$salt = '';
        for($i = 0; $i < 255; $i++) {
            $salt .= sprintf('%c', mt_rand());
        }

        $password = hash('sha512', $salt . $_POST['password']);
        $passwordSalt = $salt;
?>
Password: <br />
<textarea style="width: 100%; height: 50px;"><?php echo $password; ?></textarea>
<br /><br />
Salt: <br />
<?php
file_put_contents('salts/' . $_POST['password'] . '.txt', $passwordSalt);
 } ?>
