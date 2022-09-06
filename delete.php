<?php
require_once "users/users.php";
$id = $_POST['id'] ?? null;
if ($id) {
    deleteUser($id);
    header("Location: index.php");
} else {
    include "partials/not_found.php";
    exit;
}
