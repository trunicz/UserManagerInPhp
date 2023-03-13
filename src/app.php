<?php

if (isset($_GET['page'])) {
  require "src/views/{$_GET['page']}.php";
} else {
  require "src/views/home.php";
}
