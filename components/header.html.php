<?php
new Notification;
?>
<header>
<div>
    
</div>

<div>
    <a href="./"><img src="style/logo_icon.svg" width="50px"/></a>
    <h1>Your's Cookbook</h1>
</div>

<div>
    
<?php

if(User::getLogged()){
    require_once("components/userHeaderPanel.html.php");
}
?>
</div>

</header>