<?php
include_once 'errors.php';
$link = mysqli_connect('localhost', 'root', '', 'burger');
function get_users($db_connect)
{
    $users_query = "SELECT * FROM burger.users";
    $result = mysqli_query($db_connect, $users_query);
    echo "<table style='text-align: center;border: 1px solid #333;float: left;'><tr><th>Name</th><th>Email</th><th>phone</th></tr>";
    while ($rows = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $rows[1] . "</td>";
        echo "<td>" . $rows[2] . "</td>";
        echo "<td>" . $rows[3] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
function get_orders($db_connect)
{
    $users_query = "SELECT * FROM burger.orders";
    $result = mysqli_query($db_connect, $users_query);
    echo "<table style='text-align: center;border: 1px solid #333;'><tr><th>street</th><th>home</th><th>part</th><th>appt</th><th>floor</th><th>comment</th><th>payment</th><th>callback</th></tr>";
    while ($rows = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $rows[1] . "</td>";
        echo "<td>" . $rows[2] . "</td>";
        echo "<td>" . $rows[3] . "</td>";
        echo "<td>" . $rows[4] . "</td>";
        echo "<td>" . $rows[5] . "</td>";
        echo "<td>" . $rows[6] . "</td>";
        echo "<td>" . $rows[7] . "</td>";
        echo "<td>" . $rows[8] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
get_users($link);
get_orders($link);
