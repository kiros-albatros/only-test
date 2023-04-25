<?php
const ROUTES = [
    '' => ['GET' => 'MainController::main()'],

    'register' => ['GET' => 'UserController::getRegister()', 'POST' => 'UserController::register()'],
    'login' => ['GET' => 'UserController::getLogin()', 'POST' => 'UserController::login()'],
    'logout' => ['GET' => 'UserController::logout()'],
    'profile' => ['GET' => 'UserController::getProfile()', 'POST' => 'UserController::editProfile()'],
];