<style>
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #609555;
            object-fit: cover;
        }
    </style>
    
<div class="form-login">
    <h2 class="login-title">Bem-vindo ao RHP Kanboard</h2>
    <div class="logo-container">
    <img src="assets/img/favicon.jpg" alt="Logo do Hospital" class="logo-circle">
    </div>
    <?= $this->hook->render('template:auth:login-form:before') ?>

    <?php if (isset($errors['login'])): ?>
        <p class="alert alert-error"><?= $this->text->e($errors['login']) ?></p>
    <?php endif ?>

    <?php if (! HIDE_LOGIN_FORM): ?>
    <form method="post" action="<?= $this->url->href('AuthController', 'check') ?>">
    
        <?= $this->form->csrf() ?>

        <?= $this->form->label(t('Username'), 'username') ?>
        <?= $this->form->text('username', $values, $errors, array('autofocus', 'required', 'autocomplete="username"')) ?>

        <?= $this->form->label(t('Password'), 'password') ?>
        <?= $this->form->password('password', $values, $errors, array('required', 'autocomplete="current-password"')) ?>

        <?php if (isset($captcha) && $captcha): ?>
            <?= $this->form->label(t('Enter the text below'), 'captcha') ?>
            <img src="<?= $this->url->href('CaptchaController', 'image') ?>" alt="Captcha">
            <?= $this->form->text('captcha', array(), $errors, array('required')) ?>
        <?php endif ?>

        <?php if (REMEMBER_ME_AUTH): ?>
            <?= $this->form->checkbox('remember_me', t('Remember Me'), 1, true) ?><br>
        <?php endif ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-blue"><?= t('Sign in') ?></button>
        </div>
        <?php if ($this->app->config('password_reset') == 1): ?>
            <div class="reset-password">
                <?= $this->url->link(t('Forgot password?'), 'PasswordResetController', 'create') ?>
            </div>
        <?php endif ?>
    </form>
    <?php endif ?>

    <?= $this->hook->render('template:auth:login-form:after') ?>
</div>
