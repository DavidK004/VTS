<?php 
    const PDV = 18;

    if($_GET['name'] != "" && isset($_GET['gender']) && $_GET['membership'] != 0){
      $name = $_GET['name'];
      $gender = $_GET['gender'];
      $membership = $_GET['membership'];
      $result = 0;

      if($membership == 90000 && $gender == 'f'){
        $result += ($membership + ($membership * 0.18)-($membership*0.25));
      }
      else if($membership == 90000){
        $result += ($membership + ($membership * 0.18)-($membership*0.15));
      }
      else if($gender == 'f'){
        $result += ($membership + ($membership * 0.18)-($membership*0.1));
      }
      else{
        $result += ($membership + ($membership * 0.18));
      }

      $fin = "Podaci: ".$name." ".$gender." ".$membership." ".$result; 
      header("Location:14.php?res=".$fin);

      echo "ok";
    }else{
      header("Location:14.php?error_message=UNESITE TACNE PODATKE");
    }



?>
