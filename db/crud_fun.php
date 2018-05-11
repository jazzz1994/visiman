<?php

      function dbConnection($host,$uname,$pass,$db){
        $localhost=$host;
        $username=$uname;
        $password=$pass;
        $dbname=$db;

        $conn=mysqli_connect($localhost,$username,$password,$dbname);
              // if($conn){
              //   $msg = 'Connected Sucessfully';
              // }
              // else{
              //   $msg = 'Connection Error';
              // }
              return $conn;

      }



     function insert($tname,$arr){
            $conn = dbConnection('localhost','root','','visitormnt');
            $array_keys = array_keys($arr);
            $array_values = array_values($arr);
            $field_values= implode(",",$array_keys);
            $data_values="'".implode("','",$array_values)."'";
            $sql="INSERT into". " ".$tname." (".$field_values. ") VALUES (".$data_values.")";
            mysqli_query($conn,$sql);
            mysqli_close($conn);
          }

    function read($tname,$arr){
           $conn = dbConnection('localhost','root','','visitormnt');
           $field_values = implode(', ',$arr);
           $sql ="SELECT $field_values FROM $tname";
           $res = mysqli_query($conn,$sql);
           return $res;
           mysqli_close($conn);
    }

    function readAll($tname){
           $conn = dbConnection('localhost','root','','visitormnt');
           $sql ="SELECT * FROM $tname";
           $res = mysqli_query($conn,$sql);
           return $res;
           mysqli_close($conn);
    }


    function readrow($tname,$cond){

          $conn=dbConnection('localhost','root','','visitormnt');
          $array_keys = array_keys($cond);
          $array_values = array_values($cond);
          $cond_key = implode($array_keys);
          $cond_val = "'".implode(', ',$array_values)."'";
          $sql="SELECT * FROM $tname WHERE $cond_key = $cond_val";
          $res = mysqli_query($conn,$sql);
          return $res;
          mysqli_close($conn);
    }

  //  function readDuo($tname,$cond){
  //        $conn=dbConnection('localhost','root','','visitormnt');
  //        $array_keys = array_keys($cond);
  //        $array_values = array_values($cond);
  //        if(count($array_values)==1){
  //        $cond_key = implode($array_keys);
  //        $cond_val = "'".implode(', ',$array_values)."'";
  //        $sql="SELECT * FROM $tname WHERE $cond_key = $cond_val";
  //         }
  //         if(count($array_values)==2){
  //           $sql="SELECT * FROM $tname WHERE $array_keys[0] = '$array_values[0]' AND $array_keys[1] ='$cond_val[1]'";
  //         }
  //        $res = mysqli_query($conn,$sql);
  //        return $res;
  //        mysqli_close($conn);
  //  }
    function delete($tname,$arr){
          $conn = dbConnection('localhost','root','','visitormnt');
          $array_keys = array_keys($arr);
          $array_values = array_values($arr);
          $field_values = implode(' ',$array_keys);
          $data_values = "'".implode(', ',$array_values)."'";
          $sql="DELETE FROM $tname WHERE $field_values = $data_values";
          mysqli_query($conn,$sql);
          mysqli_close($conn);
    }

    function update($tname,$arr,$cond){
      $conn = dbConnection('localhost','root','','visitormnt');
      $condk = array_keys($cond);
      $condv = array_values($cond);
      $sql = "UPDATE $tname SET ";
       foreach($arr as $key=> $value){
            $sql .= $key."='".$value."'," ;
         }
       $sql=rtrim($sql,',');
       $sql.=" WHERE ".$condk[0]." = ".$condv[0] ;
      mysqli_query($conn,$sql);
      mysqli_close($conn);
       }


    

   function check($tname,$cond){
     $msg = "";
     $res = readrow($tname,$cond);
     $rowcount = mysqli_num_rows($res);

     if($rowcount>0){
        $msg = "Error";

     }else{
        $msg = "Success";
     }
     return $msg;

   }



?>
