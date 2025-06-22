<?php
include("connection.php");
$flag=0;
$date=$_GET["date"];
$result=mysqli_query($connect,"select * from attendance_records where date='$date';");
$row=mysqli_num_rows($result);
if($row){

   if(isset($_POST['submit']) and !empty($_POST['status'])){
        
        
            foreach($_POST['status'] as $id=>$status){
                $student_name=$_POST['name'][$id];
                $roll_number=$_POST['roll_no'][$id];
                $result=mysqli_query($connect,"update attendance_records set name='$student_name',
                roll_no='$roll_number',status='$status',date='$date' where roll_no='$roll_number'and date='$date';");
               // echo $date;
                //echo $student_name,"-",$roll_number;
                 if($result){ 
                    $flag=2;
                 }
            }

    } 


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance System
    </title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container{
            background-color: #da2222;
            border: 1px solid green;
            height: auto;
        }
        .header{
    display:flex;
    flex-direction:row;
}
.header .item2{
    width:100%;
    text-align:center;
}
.header .item2 h1{
    font-size: 40px;
    font-weight: 10;
}
.header .item2 h4{
    font-size: 20px;
    font-weight: 10;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="box1">Update Attendance</div>
        <div class="result"><?php if($flag==1){ echo "Attendance Saved Successfully";}else if($flag==2){  echo "Attendance Updated Successfully";}?></div>
        <div class="box2">
           
       <a href="home.php"><input type="button" value="Add Student"></a> 
        <a href="viewAttendance.php"><input type="button" value="View All" ></div></a>
        <div class="date">
            <?php
            echo $date;
            ?>
        </div>
        <div class="box3">
        
            <table>
                <th>Serial Number</th><th>Student Name</th><th>Roll Number</th><th>Attendance Status</th>
                <?php
                $result=mysqli_query($connect,"select * from attendance;");
                $sn=1;
                $counter=0;
                while($row=mysqli_fetch_array($result)){

                ?>
                <form action="#"  method="POST">
                <tr>
                    <td><?php echo $sn;  ?></td>
                    <td><?php  echo $row['name'];?><input type="hidden" value="<?php  echo $row['name']; ?>" name="name[]"></td>
                    <td><?php  echo $row['roll_no'];?><input type="hidden" value="<?php  echo $row['roll_no'];?>" name="roll_no[]"></td>
                    <td> <input type="radio" name="status[<?php echo $counter; ?>]" value="Present"
                    >Present
                    <input type="radio" name="status[<?php echo $counter; ?>]" value="Absent"
                    >Absent</td>
                </tr>
                <?php
                $sn++;
                $counter++;
                }
                ?>
            </table>
            <input type="submit" value="Submit" name="submit" style="width:17%;font-size:20px; float:left; margin:5px;cursor: pointer; padding:10px;">
            </form>
            
        </div>
    </div>
    
</body>
</html>