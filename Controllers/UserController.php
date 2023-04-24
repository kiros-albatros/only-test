<?php

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
    }

    function sanitize($str): string
    {
        return trim(htmlspecialchars($str));
    }

    public function createUserSession($user)
    {
        session_start();
        $_SESSION['user_id'] = $user->id;
        $session_id = sha1(random_bytes(100)) . sha1(random_bytes(100));
        setcookie('session_id', $session_id, 0, '/', '', false, true);
    }

    public function getLogin()
    {
        $data = [
            'email_tel' => '',
            'password' => '',
            'password_err' => '',
            'email_tel_err' => '',
            'empty_err' => ''
        ];
        $this->view('login', $data);
    }

    public function login()
    {
        $data = [
            'email_tel' => '',
            'password' => '',
            'password_err' => '',
            'email_tel_err' => '',
            'empty_err' => ''
        ];
        if (isset($_POST['email_tel']) && isset($_POST['password'])) {
            if (!empty(trim($_POST['email_tel'])) && !empty(trim($_POST['password']))) {
                $data ['email_tel'] = $this->sanitize($_POST['email_tel']);
                $data['password'] = $this->sanitize($_POST['password']);

                $user = $this->userModel->findUserByEmail($data['email_tel']);
                if (!$user) {
                    $user = $this->userModel->findUserByTelephone($data['email_tel']);
                }
                if ($user) {
                    if ($user->password === $data['password']) {
                        // todo переделать на проверку хеша
                        $user->password === $data['password'];
                        //    if (password_verify($data['password'], $user->password)) {
                        $this->createUserSession($user);
                        $path = 'Location:' . URLROOT;
                        header($path);
                    } else {
                        $data['password_err'] = "Неверный пароль";
                        $this->view('login', $data);
                    }
                } else {
                    $data['email_tel_err'] = 'Пользователь с такой почтой/номером телефона не зарегистрирован';
                    $this->view('login', $data);
                }
            }
        }
        $data['empty_err'] = 'Заполните все поля';
        $this->view('login', $data);
    }

    public function logout()
    {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
            session_destroy();
            $path = 'Location:' . URLROOT;
            header($path);
        } else {
            echo 'Вы не авторизованы';
        }
    }

    public function getRegister()
    {
        $data = [
            'name' => '',
            'email' => '',
            'telephone' => '',
            'password' => '',
            'name_err' => '',
            'email_err' => '',
            'telephone_err' => '',
            'password_err' => '',
            'empty_err' => ''
        ];
        $this->view('register', $data);
    }

    public function register()
    {
        $data = [
            'name' => '',
            'email' => '',
            'telephone' => '',
            'password' => '',
            'name_err' => '',
            'email_err' => '',
            'telephone_err' => '',
            'password_err' => '',
            'empty_err' => ''
        ];
        if (!empty(trim($_POST['name'])) && !empty(trim($_POST['email']))
            && !empty(trim($_POST['telephone'])) && !empty(trim($_POST['password']))
            && !empty(trim($_POST['repeat_password']))
        ) {
            if ($_POST['password'] !== $_POST['repeat_password']) {
                $data['password_err'] = 'Пароли должны быть одинаковыми';
               // $this->view('register', $data);
            } elseif ($this->userModel->findUserByName(trim($_POST['name']))) {
                $data['name_err'] = 'Это имя уже занято';
              //  $this->view('register', $data);
            } elseif ($this->userModel->findUserByEmail(trim($_POST['email']))) {
                $data['email_err'] = 'Эта почта уже используется';
              //  $this->view('register', $data);
            } elseif ($this->userModel->findUserByTelephone(trim($_POST['name']))) {
                $data['telephone_err'] = 'Этот номер уже используется';
              //  $this->view('register', $data);
            } else {
                $userData['name'] = $this->sanitize(trim($_POST['name']));
                $userData['email'] = $this->sanitize(trim($_POST['email']));
                $userData['telephone'] = $this->sanitize(trim($_POST['telephone']));
                $userData['password'] = $this->sanitize(trim($_POST['password']));
                $this->userModel->addUser($userData);
                $user = $this->userModel->findUserByName(trim($_POST['name']));
                $this->createUserSession($user);
                $path = 'Location:' . URLROOT;
                header($path);
            }
        } else {
            $data['empty_err'] = 'Заполните все поля';
          //  $this->view('register', $data);
        }
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['telephone'] = $_POST['telephone'];
        $data['password'] = $_POST['password'];
        $this->view('register', $data);
    }

    public function getProfile($id) {
        $user = $this->userModel->findUserById($id);
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'telephone' => $user->telephone,
            'password' => $user->password,
            'name_err' => '',
            'email_err' => '',
            'telephone_err' => '',
            'password_err' => '',
            'empty_err' => ''
        ];
        $this->view('profile', $data);
    }
}