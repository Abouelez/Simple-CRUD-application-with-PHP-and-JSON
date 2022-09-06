<?php include_once 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $errors = createUser($data);
    if (empty($errors))
        header("Location: index.php");
}
?>



<?php include_once 'form.php' ?>
<?php include_once 'partials/footer.php' ?>