<?php 
// if(isset($_REQUEST["name"])){
//     $name =$_REQUEST["name"];
//     echo"<h2 style='color:red'>Xin chào bạn $name</h2>";
// }
// else
//     echo"Không có tham số";

include_once("../model/entity/User.php");
// $user = new User("The Joke", "123","Truong Van Van");
// $jsonUser = json_encode($user);
// echo $jsonUser;
$userName = $_REQUEST["userName"];
if(isset($_REQUEST)){
    if($userName == "abc")
        $userName = new User("abc","123","Văn Vân");
    else
        $userName = new User("cde","1234","The Joke");
    $jsonUser = json_encode($userName);
    echo $jsonUser; 
}echo "{}";
 ?>