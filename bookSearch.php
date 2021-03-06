<head>
  <link rel="icon" href="media/Bilbio_icon.png">
  <title>Dashboard - Biblio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
  <link rel="stylesheet" href="biblio.css">
  <style>
    .container{
      display: flex;
      position: relative;
      align-items: center;
      justify-content:center;
    }
  </style>
</head>

<body>

  <header id="header">
    <!--Home Button-->
    <div>

      <a id="biblio" href="index.html">
        <h2>Biblio</h2>
      </a>
    </div>


    <!-- profile picture -->
    <?php include 'header.php'?>
  <div class="container-fluid">
        <br><br>
        <h3 align="center"><em>Search Online by ISBN</em></h3><br>
        <form method="get" id="searchBookForm">
          <div class="form-row justify-content-center">
            <div class="col-3">
              <input id="searchISBN" type="search" class="form-control" placeholder="Type in ISBN...">
            </div>
            <div class="col-2">
              <button type="submit" id="submitSearch" class="btn btn-danger">Submit</button>
            </div>
          </div>
        </form>
  </div>
  <br><br>

  <h4 align="center" style="color: grey;"><em>or<em></h4>
  <hr style="width: 85%">
  <br>
  <h3 align="center"><em>Register Book Manually</em></h3>
  <br>
  <form method="GET" id="manualBook" action="bookinfoManual.php">
    <div class="container-fluid">

    <div class="form-group form-row justify-content-center">
      <label for="Title" class="col-1 col-form-label">Title</label>
      <div class="col-3">
        <input type="text" class="form-control" name="Title" id="Title" placeholder="Title of The Book" required>
      </div>
    </div>
    <div class="form-group form-row justify-content-center">
      <label for="Author" class="col-1 col-form-label">Author</label>
      <div class="col-3">
        <input type="text" class="form-control" name="Author" id="Author" placeholder="Author of The Book" required>
      </div>
    </div>
    <div class="form-group form-row justify-content-center">
      <label for="Edition" class="col-1 col-form-label">Edition</label>
      <div class="col-3">
        <input type="text" class="form-control" name="Edition" id="Edition" placeholder="Edition of The Book" required>
      </div>
    </div>
    <div class="form-group form-row justify-content-center">
      <label for="ISBN" class="col-1 col-form-label">ISBN</label>
      <div class="col-3">
        <input type="text" class="form-control" name="ISBN" id="ISBN" placeholder="ISBN of The Book" required>
      </div>
    </div>
    <div class="form-group form-row justify-content-center">
      <label for="Year" class="col-1 col-form-label">Year of Publication</label>
      <div class="col-3">
        <input type="date" class="form-control" name="Year" id="Year" placeholder="Year of Publication of The Book">
      </div>
    </div>
    <div class="form-group form-row justify-content-center">
      <label for="Publisher" class="col-1 col-form-label">Publisher</label>
      <div class="col-3">
        <input type="text" class="form-control" name="Publisher" id="Publisher" placeholder="Publisher of The Book">
      </div>
    </div>
    <div class="form-group form-row justify-content-center">
      <label for="Pages" class="col-1 col-form-label">Pages</label>
      <div class="col-3">
        <input type="text" class="form-control" name="Pages" id="Pages" placeholder="Amount of Pages in The Book" required>
      </div>
    </div>
    <br>
    <div class="form-group form-row justify-content-center">
      <label for="CoverLink" class="col-1 col-form-label">Book Cover Link</label>
      <div class="col-3">
        <input type="text" class="form-control" name="CoverLink" id="CoverLink" placeholder="Link for the Book Cover">
      </div>
    </div>
    <h5 align="center" style="color: grey;"><em>or<em></h5>
    <br>
    <div class="form-group form-row justify-content-center">
      <label for="CoverImg" class="col-1 col-form-label">Book Cover</label>
      <div class="col-3">
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01" name="CoverImg" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
        </div>
        </div>
      </div>
    </div>
    <!-- <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Upload your file">
    </div> -->
    <br>
    <div class="form-group form-row justify-content-center">
        <button type="submit" id="submitSearch" class="btn btn-danger">Submit</button>
    </div>
  </div><br><br>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="bookSearchJS.js"></script>

  </body>
  </html>
