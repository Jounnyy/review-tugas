
<?php
// To connect database
// variabel di php pake $
$hostname = "localhost"; // ip address 132/111/54/33
$username = "root"; // Acak ddhawduawdk contoh aja
$password = ""; // acak awdiohwduah contoh
$db_name = "absensi";

// used to connect database
$db = new mysqli($hostname, $username, $password, $db_name);
// object operator, ->, is used in object 
// scope to access methods and properties of an object.
if($db -> connect_error)
{
    echo "error connection";
}
?>