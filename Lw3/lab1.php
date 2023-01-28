<?php

//добавить пользователя
function addUser()
{
    $arr = json_decode(file_get_contents('Users.json'), true);
    if (count($arr['users']) == 0) {
        $Id = 1;
    } else {
        $Id = $arr['users'][count($arr['users']) - 1]['id'] + 1;
    }
    $login = readline('Введите логин: ');
    $password = readline('Введите пароль: ');
    $name = readline('Введите имя: ');
    $userForAdd = array(
        'id' => $Id,
        'login' => $login,
        'password' => $password,
        'name' => $name
    );
    $arr['users'][] = $userForAdd;
    file_put_contents('Users.json', json_encode($arr));
}

//Изменить пользователя
function editUser()
{
    $arr = json_decode(file_get_contents('Users.json'), true);
    $userId = readline('Введите ID: ');
    $findedID = null;
    for ($i = 0; $i < count($arr['users']); $i++) {
        if (array_search($userId, $arr['users'][$i]) !== false) {
            $findedID = $i;
            $i = count($arr['users']);
        }
        else {
            $findedID = null;
        }
    }
    if ($findedID === null) {
        echo "Введённый id отсутствует \n";
        return;
    }
    $login = readline('Введите логин: ');
    $password = readline('Введите пароль: ');
    $name = readline('Введите имя: ');
    $userForAdd = array(
        'id' => $userId,
        'login' => $login,
        'password' => $password,
        'name' => $name
    );
    $arr['users'][$findedID] = $userForAdd;
    file_put_contents('Users.json', json_encode($arr));
}

//удалить пользователя
function deleteUser()
{
    $arr = json_decode(file_get_contents('Users.json'), true);;
    $userId = readline('Введите id пользователя для удаления: ');
    $findedID = null;
    for ($i = 0; $i < count($arr['users']); $i++) {
        if (array_search($userId, $arr["users"][$i]) !== false) {
            $findedID = $i;
            $i = count($arr['users']);
        }
        else {
            $findedID = null;
        }
    }
    if ($findedID === null) {
        echo "Введённый id отсутствует \n";
        return;
    }
    array_splice($arr['users'], $findedID, 1);
    file_put_contents('Users.json', json_encode($arr));
}



if (!file_exists('Users.json')){
    fopen('Users.json', "w");
    $default = '{"users": []}';
    file_put_contents('Users.json', $default);
}

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
}while (true);