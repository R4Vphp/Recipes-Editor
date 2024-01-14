<div class='options'>
    <form method='post' action='./'><button type='submit' recipes ><img src='style/edit_icon.svg' height='25px'></button></form>
    <form method='post' action='profile.php'><button type='submit' profile ><img src='style/user_icon.svg' height='25px'></button></form>
    <!--<form method='post' action='settings.php'><button type='submit' settings ><img src='style/settings_icon.svg' height='25px'></button></form>-->
    <form method='post' action='includes/logout.inc.php'><button type='submit' logout ><img src='style/logout_icon.svg' height='25px'></button></form>
</div>
<h2><?= $user->getUsername(); ?></h2>