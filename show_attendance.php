<?php
include("connection.php");
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
        height: auto;
        border: 1px solid green;
        background-color: #da2222;
        }
.container .box2 a input[type=button]{

    cursor: pointer;
    border-radius: 10px;
    border: none;
    padding: 10px;
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
        <div class="box1">Student Attendance</div>
        <div class="box2">
           
       <a href="home.php"><input type="button" value="Add Student"></a> 
        <a href="viewAttendance.php"><input type="button" value="Back" ></div></a>
        <div class="date">
            <?php echo $_POST['date'];?>
        </div>
        <div class="box3">
            <table>
                <th>Serial Number</th><th>Student Name</th><th>Roll Number</th><th>Attendance Status</th>
                <?php
                $result=mysqli_query($connect,"select * from attendance_records where date='$_POST[date]';");
                $sn=1;
                $counter=0;
                while($row=mysqli_fetch_array($result)){

                ?>
                <form action="#"  method="POST">
                <tr>
                    <td><?php echo $sn;  ?></td>
                    <td><?php  echo $row['name'];?></td>
                    <td><?php  echo $row['roll_no'];?></td>
                
                    <td> <input type="radio" name="status[<?php echo $counter; ?>]"
                    <?php
                    if($row['status']=="Present"){
                        echo "checked=checked";
                    }
                    ?> value="Present">Present
                    <input type="radio" name="status[<?php echo $counter; ?>]" 
                    <?php
                    if($row['status']=="Absent"){
                        echo "checked=checked";
                    }
                    ?>value="Absent">Absent</td>
                </tr>
                <?php
                $sn++;
                $counter++;
                }
                ?>
            </table>
            </form>
            
        </div>
    </div>
    
</body>
</html>