<?
session_start();

$num = $_POST['num'];
$id = $_POST['productId'];
$cost = $_POST['cost'];
$userId = $_COOKIE['user3'];

$n = $_SESSION['n'];

if($num!=0){
    if($_SESSION['n']!=''){
        for($i=1; $i<=$_SESSION['n']; $i++){
            if($_SESSION['mas_ID_prod'][$i-1] == $id ){
                $_SESSION['mas_amount'][$i-1] = $num;
                header('Location: /');
                exit();
            }
        }
    }    
    
    $n = $n + 1;
    $_SESSION['n'] = $n;
    
    $_SESSION['mas_ID_prod'][$n-1] = $id;
    $_SESSION['mas_cost'][$n-1] = $cost;
    $_SESSION['mas_amount'][$n-1] = $num;
}

header('Location: /');
exit();