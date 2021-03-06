<?php
    //including the database connection file
    include '../session.php';
    include_once("../config.php");

    $id = $_SESSION["UserID"];
    //fetching data in descending order (lastest entry first)
    //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
    //for displaying all books
    $result = mysqli_query($conn, "SELECT * FROM members WHERE UserID = $id ORDER BY MemberID"); // using mysqli_query instead
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../media/Bilbio_icon.png">
    <title>Dashboard - Biblio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../biblio.css">
    <style>

        #header,.navigation,footer {
            min-width: 600px;
        }
    </style>
</head>

<body>
    <?php include 'memberheader.php'?>

    <main class="container min-container alert-top">
        <div class="alert alert-warning" role="alert">
            <h2>Members</h2>
            <div class="float-right">
                <a href="addmember.php"><button id="add-book" type="button" class="btn">Add Member</button></a>
            </div>
        </div>

        
        <table id="myTable" class="table table-hover table-bordered">
            <thead>
                <tr class="header">
                    <th scope="col" style="width: 10%;">Name</th>
                    <th scope="col" style="width: 5.5%;">Phone Number</th>
                    <th scope="col" style="width:20%;">Email</th>
                    <th scope="col" style="width: 5%;">Member info</th>
                </tr>
            </thead>
     <?php 
	    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) { 		
            echo "<tr>";
            //echo "<td>".$res['BookCover']."</td>"; 
            //echo ;
            echo "<td>".$res['FirstName']." ".$res['LastName']."</td>";
            echo "<td>".$res['PhoneNumber']."</td>";
            echo "<td>".$res['Email']."</td>";
            echo "<td><a href=\"memberinfo.php?memberId=$res[MemberID]\"><button type=\"button\" class=\"btn\">View</button></a> <br><br>		
            <a href=\"deletemember.php?memberID=$res[MemberID]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button type=\"button\" class=\"btn\">Delete</button></a></td>";
        }
	?>

        </table>
    </main>

    <footer class="container text-center font-italic">
        <hr>
        Copyright &copy 2019 Biblio.com</br>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>