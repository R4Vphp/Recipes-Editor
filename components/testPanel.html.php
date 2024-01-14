<div class='panel'>
    <h2>Profile: <?= $user->getUsername(); ?><div class="options"><a href="./"><img src="style/delete_icon.svg" height="20px"></a></div></h2>
<div class='content'>
<ul>
<h4>Details:</h4>
<li>
<form method='post'>

<table>
    <tr><td><label>Username:<label></td><td><input id='username' name='username' type='text' autocomplete="off" value="<?= $user->getUsername(); ?>"/></td></tr>
    <tr><td><label>Email:<label></td><td><input id='email' name='email' type='email' autocomplete="off" value="<?= $user->getEmail(); ?>"/></td></tr>
    <tr><td><button class='button' type='submit' ><div class="icon"><img src='style/user_icon.svg' height='20px'></div>Save changes</button></td></tr>
    <tr><td><label>Registration date:<label></td><td><?= clearDate($user->getRegisterDate()); ?></td></tr>
    <tr><td><label>User ID:<label></td><td><?= $user->getId(); ?></td></tr>
</table>

</form>

</li>
</ul>
</div>
</div>