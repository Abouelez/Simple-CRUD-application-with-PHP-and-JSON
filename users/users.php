<?php
function getUsers()
{
    return getJsonData();
}

function getUserById($id)
{
    $users = getJsonData();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return false;
}

function createUser($data)
{

    $users = getJsonData();
    $errors = validate($data);
    if (empty($errors)) {
        $data['id'] = rand(500, 20000);
        $data['extension'] = uploadImage($data['id']);
        unset($data['image']);
        $users[] = $data;
        setJsonData($users);
    }
    return $errors;
}

function updateUser($data, $id)
{
    $errors = validate($data);
    if (empty($errors)) {
        if (uploadImage($data['id']))
            $data['extension'] = uploadImage($data['id']);
        $users = getJsonData();
        foreach ($users as $i => $user) {
            if ($user['id'] == $id) {
                $users[$i] = array_merge($user, $data);
                break;
            }
        }
        setJsonData($users);
    }

    return $errors;
}

function deleteUser($id)
{
    $users = getJsonData();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            unset($users[$i]);
            break;
        }
    }
    setJsonData($users);
}

function validate($data)
{
    $errors = [];

    if (empty($data['name'])) $errors['name'][] = "Name field is required";
    if (empty($data['email'])) $errors['email'][] = "Email field is required";
    if (empty($data['username'])) $errors['username'][] = "Username field is required";
    if (empty($data['phone'])) $errors['phone'][] = "Phone field is required";

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors['email'][] = "Email Not valid";
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        if (!checkExtension($_FILES['image']['name']))
            $errors['image'][] = 'File extension not supported';
    }
    return $errors;
}

function getJsonData()
{
    $jsonUsers = file_get_contents(__DIR__ . '/users.json');
    $users = json_decode($jsonUsers, true);
    return $users;
}
function setJsonData($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users));
}

function uploadImage($id)
{
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        if (!is_dir(__DIR__ . '/imgs'))
            mkdir(__DIR__ . '/imgs');
        $imageName = $_FILES['image']['name'];
        $ext = checkExtension($imageName);
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . "/imgs/${id}.${ext}");
    }
    return $ext;
}

function checkExtension($imageName)
{
    $allowedExt = ['jpg', 'jpeg', 'png'];
    $arr = explode('.', $imageName);
    $ext = end($arr);
    if (in_array($ext, $allowedExt))
        return $ext;
    else
        return false;
}
