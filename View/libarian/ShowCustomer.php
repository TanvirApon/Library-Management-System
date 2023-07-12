<!-- Code for Admin Test  -->

<?php 
session_start();

// if(isset($_SESSION['email']))
// {
//     header("Location: ../View/Dashboard.php");
    
// }
// else
// {
//     header("Location:../View/Login.php");
// }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>

    <table border="1" width="100%">
        <tr width="100%">
            <td width="15%"><img src="../Image/logo.jpg" width="15%" height="20%"></td>
            <td><?php include "../Header.php"; ?></td>
        </tr>

        <tr>
            <td>Welcome, ADMIN </td>
        </tr>

        <tr>
            <td align="middle" width="25%">
                <h3><strong>User DashBoard</strong></h3>
                <hr>

                <ul>
                    <li> <a href="AddCustomer.php">Add Customer</a> </li>
                    <li><a href="ShowBooks.php">Book</a></li>
					<li><a href="ShowEmployee.php">Employee</a></li>
                    <li><a href="Showissue.php">Issued Book</a></li>
                </ul>  

                <br>
                <strong>User Profile</strong></h3>
                <hr>
                <ul>
                    <?php
                    // $data = file_get_contents('../Model/user.json');
                    // $data = json_decode($data, true);
                    // $index = 0;
                    // foreach($data as $row){
                    //     echo "<li> <a href='EditProfile.php?index=".$index."'>Edit Profile</a></li>";
                    //     $index++;
                    // }
                    ?> 
                    <li> <a href="../../Controller/Logout.php">Logout</a> </li>
                </ul> 
            </td>

            <td width="75%">
                <center>
                    <h2><strong> Customer Details</strong></h2>

                    <table border="">
                        <tr>
                            <th> id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>DOB</th>
                            
                       
                        </tr>
                        <?php
                        // Connect to the database
                        require '../../Model/Dbconnect.php';

                        $query = "SELECT * FROM customer";
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td align='middle'>".$row['id']."</td>";
                                echo "<td align='middle'>".$row['first_name']."</td>";
                                echo "<td align='middle'>".$row['last_name']."</td>";
                                echo "<td align='middle'>".$row['username']."</td>";
                                echo "<td align='middle'>".$row['email']."</td>";
                                //echo "<td align='middle'>".$row['password']."</td>";
                                echo "<td align='middle'>".$row['dob']."</td>";
                                echo "<td align='middle'><a href='UpdateCustomer.php?id=".$row['id']."'>Edit</a></td>";
                                echo "<td align='middle'><a href='../../Controller/DeleteCustomer.php?id=".$row['id']."'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No books found</td></tr>";
                        }

                        mysqli_close($conn);
                        ?>
                    </table>
                </center>
            </td>
        </tr>

        <tr>
            <td colspan="2"><?include "../Footer.php"; ?></td>
        </tr>

    </table>
</body>
</html>
