<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));

        if($validate->passed()) {
            try {
                $user->update(array(
                    'name' => Input::get('name')
                ));

                Session::flash('home', 'Your details have been updated.');
                Redirect::to('index.php');

            } catch(Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</html>
<form action="" method="post">
    <div class="container mt-5">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo escape($user->data()->name); ?>">
        </div>

        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
