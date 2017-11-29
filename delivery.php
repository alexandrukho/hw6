<?php
include_once 'errors.php';
require_once 'vendor/autoload.php';
$remote_ip = $_SERVER['REMOTE_ADDR'];
$recaptchaResponse = $_REQUEST['g-recaptcha-response'];
$recaptcha = new \ReCaptcha\ReCaptcha('6LfvTzoUAAAAAOiB_Dri4w-_8TqcIuaJSjBO_YWc');
$resp = $recaptcha->verify($recaptchaResponse, $remote_ip);
if ($resp->isSuccess()) {
    echo "nice";
} else {
    'recaptcha error';
}

$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars(trim($_POST['email']));
$street = htmlspecialchars($_POST['street']);
$home = htmlspecialchars($_POST['home']);
$part = htmlspecialchars($_POST['part']);
$appt = htmlspecialchars($_POST['appt']);
$floor = htmlspecialchars($_POST['floor']);
$comment = htmlspecialchars($_POST['comment']);
if (isset($_POST['payment'])) {
    $payment = $_POST['payment'];
} else {
    $payment = '';
}
if (isset($_POST['callback'])) {
    $callback = $_POST['callback'];
} else {
    $callback = '';
}

$link = mysqli_connect('localhost', 'root', '', 'burger');

function registration($db_connect, $name, $email, $phone)
{
    $add_user = "INSERT INTO burger.users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $registration = mysqli_query($db_connect, $add_user);
    return $registration;
}

;
function authorization($db_connect, $street, $home, $part, $appt, $floor, $comment, $payment, $callback)
{

    $add_order = mysqli_query($db_connect,
        "INSERT INTO burger.orders (street, home, part, appt, floor, comment, payment, callback) 
VALUES ('$street', '$home', '$part', '$appt', '$floor', '$comment', '$payment', '$callback')"
    );


}

;
function check_user($db_connect, $email)
{
    $check = "SELECT burger.users.email FROM burger.users WHERE burger.users.email = '$email'";
    $result = mysqli_query($db_connect, $check);
    if (mysqli_num_rows($result) != 0) {
        return true;
    } else {
        return false;
    }
}

;

if (check_user($link, $email) === true) {
    authorization($link, $street, $home, $part, $appt, $floor, $comment, $payment, $callback);
} else {
    registration($link, $name, $email, $phone);
    require_once "mailer.php";
    $mail->send();
    echo 'Message has been sent';
    authorization($link, $street, $home, $part, $appt, $floor, $comment, $payment, $callback);
};
$get_id = mysqli_query($link, "SELECT orders.id FROM burger.orders ORDER BY id DESC LIMIT 1")->fetch_row();

$update_count = mysqli_query($link, "UPDATE burger.users SET users.counter = users.counter + 1 WHERE users.email = '$email'");

$get_count = mysqli_query($link, "SELECT burger.users.counter FROM burger.users WHERE email = '$email'")->fetch_row();
foreach ($get_id as $id) {
    $order_id = $id;
}
foreach ($get_count as $i) {
    $counter = $i;
}

$order_data = "<html><head><body>";
$order_data .= "<p>" . "Заказ  №  " . $order_id . "</p>";
$order_data .= "<br><p>Ваш заказ будет доставлен по адресу:</p><br>";
$order_data .= "<b>улица :</b><b>$street</b><br>";
$order_data .= "<b>дом :</b><b>$home</b><br>";
$order_data .= "<b>Корпус :</b><b>$part</b><br>";
$order_data .= "<b>квартира :</b><b>$appt</b><br>";
$order_data .= "<b>этаж :</b><b>$floor</b><br>";
$order_data .= "<b>Заказ:</b>DarkBeefBurger за 500 рублей, 1 шт<b></b>";
$order_data .= "<p>" . "Спасибо, это Ваш " . $counter . "-й заказ." . "</p>";
$order_data .= "</body></head></html>";
$order_file = fopen('order.php', 'w+');
$order_file = file_put_contents('order.php', $order_data);


