<?php
include('template_header.php');
include('dal.php');

?>


<div class="container" id="Cerca">
    <h2>Log-in</h2>
<form method="post" action="login_act.php">
<p> 
    <label>Username</label><br>
    <input name="username" id="username" placeholder="Inserisci il tuo username..."><br>
</p> 
    <p> 
    <label>Password</label><br>
    <input name="password" id="password" placeholder="Inserisci la tua password..." type="password"><br></p> 
    <button type="submit">Entra con le credenziali</button>
</form>
</div>


<?php
include('template_footer.php');

?>