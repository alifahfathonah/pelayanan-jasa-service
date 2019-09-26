<div class="lowin-box lowin-login">
    <div class="lowin-box-inner">
        <form method="post">
            <p>Masuk untuk melanjutkan</p>
            <?php $this->view('message') ?>
            <div class="lowin-group">
                <label>Username <a href="#" class="login-back-link">Sign in?</a></label>
                <input type="text" value="<?= set_value('user') ?>" name="user" class="lowin-input" placeholder="username">
                <?= form_error('user') ?>
            </div>
            <div class="lowin-group password-group">
                <label for="">Password</label>
                <input type="password" name="pass" autocomplete="current-password" class="lowin-input" placeholder="password">
                <?= form_error('pass') ?>
            </div>
            <input type="submit" class="lowin-btn login-btn" value="LOGIN">
        </form>
    </div>
</div>