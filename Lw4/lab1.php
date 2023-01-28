<?php


do {
    echo "\n";
    echo "Введите 1, чтобы добавить \n";
    echo "Введите 2, чтобы изменить \n";
    echo "Введите 3, чтобы удалить \n";
    echo "Введите 4, чтобы завершить \n";
    $choice = readline();
    switch ($choice) {
        case '1':
            addUser();
            break;
        case '2':
            editUser();
            break;
        case '3':
            deleteUser();
            break;
        case '4':
            return false;
            break;
    }
} while (true);


function addUser()
{
    $connection = mysqli_connect("localhost", "root", "root", "lw4");
    if ($connection == false) {
        print("Ошибка при подключении");
        exit();
    }

    print("Добавление пользователя в базу данных: \n\n");
    $id = 0;
    $sql = "select count(0) from users";
    if ($result = mysqli_query($connection, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0] + 1;
        }
    }
    else {
        print("Произошла ошибка");
    }

    if ($id < 1) {
        $id = 1;
    }

    $login = readline('Введите логин: ');
    $password = readline('Введите пароль: ');
    $name = readline('Введите имя: ');

    $sql = "INSERT INTO users SET
        id = {$id},
        login = '{$login}',
        password = '{$password}',
        name = '{$name}'";

    $result = mysqli_query($connection, $sql);
    if ($result == false) {
        print("\n\nПроизошла ошибка");
    }
    else {
        print("\n\nПользователь добавлен");
    }
}

function editUser()
{
    $connection = mysqli_connect("localhost", "root", "root", "lw4");
    if ($connection == false) {
        print("Ошибка при подключении");
        exit();
    }
    print("Редактирование пользователя базы данных: \n\n");

    $id = readline('Введите ID: ');


    $sql = "select `id` from users where `id` = '{$id}'";
    if ($result = mysqli_query($connection, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
        }
    }
    else {
        print("Произошла ошибка");
    }

    if ($id === null) {
        echo "Введённый id отсутствует \n";
        return;
    }
    $login = readline('Введите логин: ');
    $password = readline('Введите пароль: ');
    $name = readline('Введите имя: ');

    $sql = "UPDATE users SET
        id = {$id},
        login = '{$login}',
        password = '{$password}',
        name = '{$name}'
        WHERE id = {$id}";

    $result = mysqli_query($connection, $sql);
    if ($result == false) {
        print("\n\nПроизошла ошибка");
    }
    else {
        print("\n\nПользователь отредактирован");
    }
}


function deleteUser()
{
    $connection = mysqli_connect("localhost", "root", "root", "lw4");
    if ($connection == false) {
        print("Ошибка при подключении");
        exit();
    }
    print("Удаление пользователя из базы данных: \n\n");

    $id = readline('Введите ID: ');


    $sql = "select `id` from users where `id` = '{$id}'";
    if ($result = mysqli_query($connection, $sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
        }
    }
    else {
        print("Произошла ошибка");
    }

    if ($id === null) {
        echo "Введённый id отсутствует \n";
        return;
    }

    $sql = "DELETE FROM users WHERE id = {$id}";

    $result = mysqli_query($connection, $sql);
    if ($result == false) {
        print("\n\nПроизошла ошибка");
    }
    else {
        print("\n\nПользователь удалён");
    }
}