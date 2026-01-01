<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    <link rel="stylesheet" href="style.css">


</head>

<body>

            <?php
                // Connect to the database
                $conn = new mysqli('localhost', 'root', '', 'student_management');
                $result =mysqli_query($conn,"select * from student");
                
                $id='';
                $name='';
                $address='';

                // Check connection
                if(isset($_POST['id'])){
                    $id=$_POST['id'];
                    $name=$_POST['username'];
                    $address=$_POST['address'];
                }
                
                // if(isset($_POST['name'])){
                //     $name=$_POST['name'];
                // }
                // if(isset($_POST['address'])){
                //     $address=$_POST['address'];
                // }

                $sql='';

                // Add student
                if(isset($_POST['add'])){
                    $sql="insert into student (id , name , address) values($id, '$name', '$address')";
                    mysqli_query($conn,$sql);
                    header("Location: home.php");

                }

                // Remove student
                if(isset($_POST['remove'])){
                    $sql="delete from student where id=$id";
                    mysqli_query($conn,$sql);
                    header("Location: home.php");

                }





            ?>

    <h1 style="text-align: center; padding: 20px;">Welcome to the Student Management System</h1>
    <div id="mother">
        <form action="" method="POST">
            <aside>
                <div id="div">


                    <img src="https://pioneerseschool.com/uploads/ar/student-information-system.webp" width="100" alt="logo">
                    <h3>Admin Dashboard</h3>
                    <label>ID Student:</label>
                    <input type="text" name="id" id="id" placeholder="ID">
                    <br>
                    <label>Username:</label>
                    <input type="text" name="username" id="name" placeholder="Username">
                    <br>
                    <label>Address:</label>
                    <input type="text" name="address" id="address" placeholder="Address">
                    <br> <br>
                    <button name="add">Add Student</button>
                    <button name="remove">Remove Student</button>


                </div>
            </aside>

            <main>
                <table border="3" id="tbl">
                    <tr>
                        <th>ID Student</th>
                        <th>Username</th>
                        <th>Address</th>
                    </tr>

                    <?php

                    while($row=mysqli_fetch_array($result)){

                        echo "<tr>";
                        echo "<td>" .$row['id'] . "</td>";
                        echo "<td>" .$row['name'] . "</td>";
                        echo "<td>" .$row['address'] . "</td>";
                        echo "</tr>";


                    }
                    
                    
                    
                    ?>

                </table>

            </main>

        </form>

    </div>

</body>

</html>