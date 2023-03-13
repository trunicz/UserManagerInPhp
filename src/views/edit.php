<?php require_once 'src/resource/head.php';

use Trnx\Usermanager\models\User;

if (isset($_GET['uuid'])) {
  $user = User::get($_GET['uuid']);
} else if (isset($_POST['delete'])) {
  $uuid = $_POST['uuid'];
  $user = User::delete($uuid);
  header('Location: /?page=home');
} else if ($_POST > 0) {
  $username = $_POST['username'];
  $usermail = $_POST['usermail'];
  $uuid = $_POST['uuid'];

  $user = User::get($uuid);
  $user->setUsername($username);
  $user->setUsermail($usermail);

  $user->update();
  header('Location: /?page=home');
}

?>

<body>
  <?php require_once 'src/layouts/header.php'; ?>
  <h1>✂️Edit User</h1>

  <div class="main-content">
    <form action="?page=edit" method="POST">
      <label for="username">User Name: </label>
      <input type="text" value="<?= $user->getUsername() ?>" name="username" id="username">
      <label for="usermail">User Mail: </label>
      <input type="text" value="<?= $user->getUsermail() ?>" name="usermail" id="usermail">
      <input type="hidden" name="uuid" value="<?= $user->getUUID() ?>">
      <input type="submit" value="Edit">
    </form>
    <form action="?page=edit" method="post">
      <input type="hidden" name="uuid" value="<?= $user->getUUID() ?>">
      <input type="hidden" name="delete" value="true">
      <input type="submit" value="Delete" id="delete-button">
    </form>
  </div>

</body>

</html>