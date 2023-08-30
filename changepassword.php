<?php
/**
 * Created by Chris on 9/29/2014 3:53 PM.
 */

require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}



<form action="" method="post">
    <div class="field">
        <label for="current_password">Current Password</label>
        <input type="password" name="current_password" id="current_password">
    </div>

    <div class="field">
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password">
    </div>

    <div class="field">
        <label for="new_password_again">New Password Again</label>
        <input type="password" name="new_password_again" id="new_password_again">
    </div>

    <input type="hidden" name="token" id="token" value="<?php echo escape(Token::generate()); ?>">
    <input type="submit" value="Change Password">
</form>