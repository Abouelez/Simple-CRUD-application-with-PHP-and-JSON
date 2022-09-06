<div class="container">
    <div class="card">
        <div class="card-header">
            <a type="button" href="index.php" class="btn btn-dark">Back to home page</a>
            <h3>
                <?php if (isset($data)) : ?>
                    Update user <b><?php echo $data['name'] ?></b>
                <?php else : ?>
                    Create new User
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="txt" name="name" class="form-control" id="name" value="<?php if (isset($data['name'])) echo $data['name'] ?>">
                    <div class="form-text" style="color:red"><?php if (!empty($errors['name'])) echo $errors['name'][0] ?></div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="txt" value="<?php if (isset($data['username'])) echo $data['username'] ?>" name="username" class="form-control" id="username">
                    <div class="form-text" style="color:red"><?php if (!empty($errors['username'])) echo $errors['username'][0] ?></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" value="<?php if (isset($data['email'])) echo $data['email'] ?>" name="email" class="form-control" id="email">
                    <div class="form-text" style="color:red"><?php if (!empty($errors['email'])) echo $errors['email'][0] ?></div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="txt" value="<?php if (isset($data['phone'])) echo $data['phone'] ?>" name="phone" class="form-control" id="phone">
                    <div class="form-text" style="color:red"><?php if (!empty($errors['phone'])) echo $errors['phone'][0] ?></div>
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="txt" value="<?php if (isset($data['website'])) echo $data['website'] ?>" name="website" class="form-control" id="website">
                    <div class="form-text" style="color:red"> </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <div class="form-text" style="color:red"><?php if (!empty($errors['image'])) echo $errors['image'][0] ?> </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>