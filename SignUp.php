<?php



include 'library/DBConnection.php';

if(isset($_SESSION)){
    session_destroy();
}

$error= [];
$username = filter_input(INPUT_POST, 'username',  FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password',  FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email',  FILTER_SANITIZE_STRING);


if(empty($username) || !isset($username)) {
    $error ['username'] = 'Username is empty';
}
if(empty($password) || !isset($password)){
    $error ['password'] = 'Password is empty';
}

if(empty($error)){
    $sql = 'SELECT * FROM user WHERE username = ?';
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $username);

    //send to database
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data  

    echo password_verify($password, $user['password']);
    if(!empty($user)){
        if(password_verify($password, $user['password'])){
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            echo $_SESSION['id'];
            header('Location: index.php');
        } else{
            $error['password'] = 'Wrong Password';
            require_once('LogIn.php');
        }
    } else{
        $error['username'] = 'Username doesn\'t exist';
        require_once('LogIn.php');
    }
} else{
    require_once('LogIn.php');
}

?>