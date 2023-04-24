<?php
const ROUTES = [
    '' => ['GET' => 'MainController::main()'],

    'register' => ['GET' => 'UserController::getRegister()', 'POST' => 'UserController::register()'],
    'login' => ['GET' => 'UserController::getLogin()', 'POST' => 'UserController::login()'],
    'profile' => ['GET' => 'UserController::getProfile()'],
];