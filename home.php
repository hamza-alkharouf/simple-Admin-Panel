<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php

    #connect with database
        $host='localhost';
        $user='root';
        $pass='';
        $db='student1';
        $con=mysqli_connect($host,$user,$pass,$db);
        $res=mysqli_query($con,"select * from student");

        # button variable 
        $id='';
        $name='';
        $address='';
        if(isset($_POST['id'])){
            $id=$_POST['id'];
        }
        if(isset($_POST['name'])){
            $name=$_POST['name'];
        }
        if(isset($_POST['address'])){
            $address=$_POST['address'];
        }
        $sqls='';
        if(isset($_POST['add'])){
            $sqls="insert into student value($id,'$name','$address')";
            mysqli_query($con,$sqls);
            header('Location: home.php');
            exit;
        }
        if(isset($_POST['del'])){
            $sqls="delete from student where name='$name'";
            mysqli_query($con,$sqls);
            header('Location: home.php');
            exit;
        }

    ?>




    <div id="mother">
        <form method="POST">
            <!-- Admin Panel -->
                <aside>
                    <div>

                        <img src="./css/student.png" alt="logo" style="width: 150px;">

                        <h3>Admin Panel</h3>
                        <label for="">ID Student</label><br>
                        <input type="text" name="id" id="id"><br>
 
                        <label for="">Name Student</label><br>
                        <input type="text" name="name" id="name"><br>

                        <label for="">Address Student</label><br>
                        <input type="text" name="address" id="address"><br><br>

                        <button name="add">Add Student</button>
                        <button name="del">delete Student</button>

                    </div>
                </aside>
            <!-- View student data -->
                <main>
                    <table id="tbl">
                        <tr>
                            <th>ID Student</th>
                            <th>Name Student</th>
                            <th>Address Student</th>
                        </tr>
                        <?php
                            while( $row=mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['address']."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </main>
        </form>
    </div>
</body>
</html>