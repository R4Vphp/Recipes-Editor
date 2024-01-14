<div class='panel'>
    <h2>Profile: <?= $user->getUsername(); ?><div class="options"><a href="./"><img src="style/delete_icon.svg" height="20px"></a></div></h2>
<div class='content'>
<ul>
<h4>Details:</h4>
<li>
<form method='post'>

<table>
    <tr><td><label>Username:<label></td><td><?= $user->getUsername(); ?></td></tr>
    <tr><td><label>Email:<label></td><td><?= $user->getEmail(); ?></td></tr>
    <tr><td><label>Registration date:<label></td><td><?= clearDate($user->getRegisterDate()); ?></td></tr>
    <tr><td><label>User ID:<label></td><td><?= $user->getId(); ?></td></tr>
</table>

</form>

</li>
</ul>
</div>
</div>