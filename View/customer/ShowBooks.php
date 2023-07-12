<!-- Code for Admin Test  -->

<?php 


session_start();

$customer_id = $_SESSION['id'];
$customer_name = $_SESSION['username'];


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
        <td>Welcome, <?php echo $customer_name;?> </td>
        </tr>

        <tr>
            <td align="middle" width="25%">
                <h3><strong>User DashBoard</strong></h3>
                <hr>

                <ul>
                <li> <a href="ShowBooks.php">Show Books</a> </li>
                <li> <a href="Showissue.php">Book Issue</a></li>
                <li> <a href="Books.php">Book Request</a> </li>
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
                    <h2><strong> Book Details</strong></h2>

                    <table border="">
                        <tr>
                            <th>Book id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Publication Year</th>
                            <th>Genre</th>
                            <th>Quantity</th>
                            <th>Shelf Number</th>
                            <th>Language</th>
                            <th>Total Pages</th>
                       
                       
                        </tr>
                        <?php
                        // Connect to the database
                        require '../../Model/Dbconnect.php';

                        $query = "SELECT * FROM book";
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td align='middle'>".$row['id']."</td>";
                                echo "<td align='middle'>".$row['title']."</td>";
                                echo "<td align='middle'>".$row['author']."</td>";
                                echo "<td align='middle'>".$row['publisher']."</td>";
                                echo "<td align='middle'>".$row['publication_year']."</td>";
                                echo "<td align='middle'>".$row['genre']."</td>";
                                echo "<td align='middle'>".$row['Quantity']."</td>";
                                echo "<td align='middle'>".$row['shelf_number']."</td>";
                                echo "<td align='middle'>".$row['language']."</td>";
                                echo "<td align='middle'>".$row['total_pages']."</td>";
                                echo "<td align='middle'><a href='issue.php?id=".$row['id']."'>Issue Book</a></td>";
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
