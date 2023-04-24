<?php
include_once 'partial/header.php'; ?>
<div class="register">
    <h3>Личный кабинет</h3>
    <form class="register__form" action="<?=URLROOT?>/profile" method="post">
        <label for="name">Имя</label>
        <input type="text" name="name" required value="<?= $data['name']; ?>">
        <?= (!empty($data['name_err'])) ? '<p class="invalid">' . $data['name_err'] . '</p>': ''; ?>
        <label for="email">Почта</label>
        <input type="text" name="email" required value="<?= $data['email']; ?>">
        <?= (!empty($data['email_err'])) ? '<p class="invalid">' . $data['email_err'] . '</p>': ''; ?>
        <label for="telephone">Номер телефона</label>
        <input type="text" name="telephone" required value="<?= $data['telephone']; ?>">
        <?= (!empty($data['telephone_err'])) ? '<p class="invalid">' . $data['telephone_err'] . '</p>': ''; ?>
        <label for="password">Пароль</label>
        <input type="password" name="password" required value="<?= $data['password']; ?>">
        <?= (!empty($data['password_err'])) ? '<p class="invalid">' . $data['password_err'] . '</p>': ''; ?>
        <label for="repeat_password">Повторите пароль</label>
        <input type="password" name="repeat_password" required value="<?= $data['password']; ?>">
        <input type="submit" value="Зарегистрироваться">
    </form>
</div>
<?php
include_once 'partial/footer.php'; ?>