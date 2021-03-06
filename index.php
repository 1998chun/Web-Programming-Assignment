<?php 
    include 'session.php';
    include 'config.php';

    $id = $_SESSION['UserID'];
    $sql = "SELECT * FROM books INNER JOIN owned ON owned.ISBN=books.ISBN WHERE UserId=$id ORDER BY owned.CreatedDate DESC LIMIT 4";
    $result = mysqli_query($conn,$sql);
    $today = date('Y-m-d');

    $checkout = "SELECT books.BookCover, books.Title, members.FirstName, members.LastName, transactions.ExpiredDate FROM transactions
    INNER JOIN members ON transactions.MemberID = members.MemberID
    INNER JOIN books ON transactions.ISBN = books.ISBN WHERE members.UserID =$id AND transactions.transactionStatus='Lending' LIMIT 3";
    
    $overdue = "SELECT books.BookCover, books.Title, members.FirstName, members.LastName, transactions.ExpiredDate FROM transactions
    INNER JOIN members ON transactions.MemberID = members.MemberID
    INNER JOIN books ON transactions.ISBN = books.ISBN 
    WHERE members.UserID =$id AND transactions.transactionStatus='Lending' AND $today > transactions.ExpiredDate LIMIT 3";
    
    
    $checkoutr = mysqli_query($conn,$checkout);
    $overduer = mysqli_query($conn,$overdue);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="media/Bilbio_icon.png">
    <title>Dashboard - Biblio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="biblio.css">
    
</head>

<body onresize="resize()" onload="resize()" background="media/library-dark.jpg">

    <?php include 'header.php';?>

    <main class="container">
        <div class="row">
            
            <div id="new-book" class="inline boxes">
                <h5>New book</h5>
                <div class="dash-book-div" id="smallbox">
                    <a href="bookSearch.php"><img src="media/add.png" class="op-1"></a>
                    <?php 
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='bookinfo/bookinfo.php?ISBN=".$row["ISBN"]."'><img src='".$row['BookCover']."' class='dash-newbook'></a>";
                            }
                        }
                    ?>
                </div>
            </div>

            <div id="stats" class="inline boxes">
                <h5>Total</h5>
                <?php 
                    $query = "SELECT * FROM owned WHERE UserId=$id";
                    $data = mysqli_query($conn,$query);
                    $numbooks = mysqli_num_rows($data);
                    echo "<h3>".$numbooks."</h3>"
                ?><br>
                <h5>Checkouts</h5>
                <?php
                    echo "<h3>".mysqli_num_rows($checkoutr)."</h3>";
                ?><br>
                <h5>Overdue</h5>
                <?php
                    echo "<h3>".mysqli_num_rows($overduer)."</h3>";
                ?><br>
            </div>
        </div>
        <div class="row">
            <div class="boxes-2 inline">
                <h5>Check-out</h5>
                <a href="Lending/lending-searchMember.php"><img src="media/add.png" class="op-2"></a>
                <a href="Lending/lending.php"><img src="media/minus.png" class="op-1" id="minus"></a>
                <!-- <div class="dash-checkout"> 
                    <img src="https://images-na.ssl-images-amazon.com/images/I/819ZixpQzUL.jpg">
                    <div>
                        <p>The Power of Habit</p>
                        <p>by Chan Ka Chun</p>
                        <p>due 2017/08/01</p>
                    </div>
                </div> -->
                <?php 
                    while($row = mysqli_fetch_assoc($checkoutr)){
                        echo "<div class='dash-checkout'>";
                        echo "<img src=".$row['BookCover'].">";
                        echo "<div>";
                        echo "<p>".$row['Title']."</p>";
                        echo "<p>by ".$row['FirstName']." ".$row['LastName']."</p>";
                        echo "<p>due ".$row['ExpiredDate']."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?> 
            </div>

            <div class="boxes-2 inline">
                <h5>Overdue</h5>
                <?php 
                    while($row = mysqli_fetch_assoc($overduer)){
                        echo "<div class='dash-checkout'>";
                        echo "<img src=".$row['BookCover'].">";
                        echo "<div>";
                        echo "<p>".$row['Title']."</p>";
                        echo "<p>by ".$row['FirstName']." ".$row['LastName']."</p>";
                        echo "<p>due ".$row['ExpiredDate']."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?> 
            </div>
            </div>
        </div>


    </main>
    <footer class="text-center font-italic">
        <hr>
        Copyright &copy 2019 Biblio.com<br>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script>
    
    function resize(){
			var box = document.querySelector("#new-book");
            var smallbox = document.querySelector("#smallbox");
            // console.log(box.offsetHeight);
            // console.log(smallbox.offsetHeight);
            box.style.height = smallbox.offsetHeight + 100 +'px';
			

		}</script>
</body>

</html>