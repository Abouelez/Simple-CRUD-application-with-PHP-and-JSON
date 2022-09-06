<?php
include_once "partials/header.php";
$users = getUsers();
?>

<a type="button" href="create.php" class="btn btn-secondary">Create new user</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Website</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td>
                    <?php if (isset($user['extension'])) : ?>
                        <img style="width: 60px" src="<?php echo "users/imgs/" . $user['id'] . "." . $user['extension'] ?>" alt="">
                    <?php endif; ?>
                </td>

                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td>
                    <a target="_blank" href="http://<?php echo $user['website'] ?>">
                        <?php echo $user['website'] ?>
                    </a>
                </td>
                <td>
                    <a type="button" href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm  btn-outline-primary ">View</a>
                    <a type="button" href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-sm  btn-outline-secondary">Edit</a>

                    <form style="display: inline-block" method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-sm  btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include_once "partials/footer.php" ?>