<?php
include_once 'partial/header.php'; ?>
    <div class="register">
        <h3>Вход</h3>
        <form class="register__form" action="<?= URLROOT ?>/login" method="post">

            <?= !empty($data['empty_err']) ? '<p class="invalid">Заполните поля</p>' : '';?>

            <label for="email_tel">Почта или номер телефона</label>
            <input type="text" name="email_tel" value="<?= $data['email_tel']; ?>">
            <?= (!empty($data['email_tel_err'])) ? '<p class="invalid">' . $data['email_tel_err'] . '</p>': ''; ?>
            <label for="password">Пароль</label>
            <input type="password" name="password">
            <?= (!empty($data['password_err'])) ? '<p class="invalid">' . $data['password_err'] . '</p>': ''; ?>
            <input type="submit" value="Войти">
        </form>
    </div>
<?php
include_once 'partial/footer.php'; ?>