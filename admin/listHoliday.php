<?php
include ('../common/admin/header.php');


if(!isset($_SESSION['temail']) && !isset($_SESSION['aemail'])){
    header("location:index.php");
}

 ?>

 <?php
     if(isset($_GET['did'])){
       $did =$_GET['did'] ;
       delete('holidays',array("id"=>$did));
     }

     if(isset($_POST['submit']) && $_POST['submit']=='delete'){
       if(isset($_POST['holiday'])){
           foreach($_POST['holiday'] as $key => $value) {
          delete('holidays',array('id'=>$value));
        }
     }
   }
?>

 <title>Manage Holidays</title>


 <body class="nav-md">
   <div class="container body">
     <div class="main_container">

         <?php include('../common/admin/leftNavBar.php'); ?>
       <?php include('../common/admin/topNavBar.php'); ?>

     <?php
     $res_hol = readAll("holidays");
     ?>

 <!-- page content -->
       <div class="right_col" role="main">
         <div class=""><br/>
           <div class="page-title">
             <div class="title_left">
               <?php
                 if(isset($_GET['hid'])){
                  echo "<h3>Edit Holiday</h3>";
                }
                else{
                  echo "<h3>Add Holiday</h3>";
                }
               ?>
             </div>

             <div class="title_right">
             </div>
           </div>
           <div class="clearfix"></div>
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Holiday<small>please fill the following form</small></h2>
                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                   <br />

                   <form method='POST' action="" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                     <div class="table-responsive" >
                       <table border="2" class="table table-striped jambo_table bulk_action">

                           <tr class="headings">
                               <th> <div class="input-group-prepend" width = "10">
                                       <div class="input-group-text">
                                         <input type="checkbox" id="hol" onclick = "holCheck();" aria-label="Checkbox for following text input">
                                       </div>
                                     </div>
                               </th>
                               <th class="column-title">ID</th>
                               <th class="column-title">Title</th>
                               <th class="column-title">Date</th>
                               <th class="column-title">Description</th>
                               <th class="column-title">Operations</th>
                           </tr>


                     <?php
                       $i=1;
                       while($result = mysqli_fetch_assoc($res_hol)) {
                           $hid          = $result["id"];
                           $title        = $result["title"];
                           $date         = $result["date"];
                           $desc         = $result["descr"];



                     ?>


                       <tr class="even pointer">
                         <th> <div class="input-group-prepend">
                                 <div class="input-group-text">
                                   <input type="checkbox" name = "holiday[]" value="<?php echo $hid; ?>" aria-label="Checkbox for following text input">
                                 </div>
                               </div>
                         </th>
                         <td> <?php echo $i; ?>  </td>
                         <td> <?php echo ucfirst($title); ?> </td>
                         <td> <?php echo ucfirst($date); ?> </td>
                         <td> <?php  echo $desc;  ?>  </td>

                         <td><a href='formHoliday.php?hid=<?php echo $hid ;?>'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                           <span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span>
                           <a onclick = "return confirm('Are you sure?')" href='listHoliday.php?did=<?php echo $hid;?>'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                     </tr>
                       <?php $i++; }
                ?>
                 </table>
               </div>
 <!-- buttons s -->
                       <div class="form-group">
                           <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button  type='submit' class='btn btn-danger col-md-7 col-xs-12' onclick="return confirm('Are you sure?')" name='submit' value='delete'>delete selected</button>
                           </div>
                       </div>
 <!-- buttons e -->

                   </form>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>

        </div>
    </div>

    <script>
        function holCheck(){
         var scheck       = document.querySelector("#hol");
         var selectall    = document.querySelectorAll("input[name='holiday[]']");

        for(var i=0; i<selectall.length;i++){
          if(scheck.checked == true){
           selectall[i].checked = true;
           }
           if(scheck.checked == false){
             selectall[i].checked =false;

           }
      }
      }

    </script>
    <?php include('../common/admin/footer.php'); ?>

  </body>
