<?php require_once 'src/resource/head.php';

use Trnx\Usermanager\models\User;

if (isset($_POST['username']) and isset($_POST['usermail'])) {
  $username = $_POST['username'];
  $usermail = $_POST['usermail'];

  $user = new User($username, $usermail);
  $user->save();
  header('Location: /?page=home');
}

?>

<body>
  <?php require_once 'src/layouts/header.php'; ?>
  <h1>👤New User</h1>

  <div class="main-content">
    <form action="?page=create" method="POST">
      <label for="username">User Name: </label>
      <input type="text" name="username" id="username">
      <label for="usermail">User Mail: </label>
      <input type="text" name="usermail" id="usermail">
      <input type="submit" value="Create">
    </form>
  </div>

</body>

</html>