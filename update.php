<?php include_once 'partials/header.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $data = getUserById($id);
} else {
    include "partials/not_found.php";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array_merge($data, $_POST);
    $errors = updateUser($data, $id);
    if (empty($errors))
        header("Location: index.php");
}

?>


<?php include_once 'form.php' ?>
<?php include_once 'partials/footer.php' ?>