<?php require_once 'src/resource/head.php';

use Trnx\Usermanager\models\User;

$users = User::getAll();

?>

<body>
  <?php require_once 'src/layouts/header.php'; ?>
  <h1>🏠Home</h1>
  <div class="main-content">
    <h3>👤Users List</h3>
    <?php
    if (count($users) <= 0) {
      echo "<h4>❌Users Doesn't exists❌</h4>";
    }
    ?>
    <ul class="users-list">
      <?php foreach ($users as $user) { ?>
        <li><a href="?page=edit&uuid=<?= $user->getUUID() ?>"><?= $user->getUsername() ?></a></li>
      <?php } ?>
    </ul>
  </div>
</body>

</html>