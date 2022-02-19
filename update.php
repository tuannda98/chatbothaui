<?php
require_once 'config.php'; //lấy thông tin từ config
$conn = mysqli_connect($DBHOST, $DBUSER, $DBPW, $DBNAME) or die ('Không thể kết nối tới database');
$ID = $_POST['ID'];// lấy id từ smaxbot
$gioitinh = $_POST['gt']; // lấy giới tính
$avatar = $_POST['avatar'];
$fullname = $_POST['fullname'];
$locale = $_POST['locale'];
function isUserExist($userid) { //hàm kiểm tra xem user đã tồn tại chưa 
  global $conn;
  $result = mysqli_query($conn, "SELECT `ID` from `users` WHERE `ID` = $userid LIMIT 1");
  $row = mysqli_num_rows($result);
  return $row;
}

/// Xét giới tính
if ($gioitinh == 'male'){
$gioitinh = 1;
} else if ($gioitinh == 'female'){
$gioitinh = 2;
}

if ( !isUserExist($ID) ) { // nếu chưa tồn tại thì update lên sever
    $sql = "INSERT INTO `users` (`ID`, `trangthai`, `hangcho` ,`gioitinh`, `fullname`, `avatar`, `locale`) VALUES (".$ID.", 0, 0 , $gioitinh, '$fullname', '$avatar', '$locale')";
   $info = mysqli_query($conn,$sql );
  }
mysqli_close($conn);
?>