

<?php
error_reporting(E_ALL ^ E_NOTICE); //specify All errors and warnings are displayed

session_start();

if(!isset($_SESSION["username"])){
    header("Location: ../pages/login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Book Catalog</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
    <script src="../scripts/books.js"></script>

    <style>
        .card-content {
            width: 90%;
            height: 100%;
            background-color: #f2f2f2; 
            }
        
        .main-panel {
            margin: auto;
            width: 90%;
        }
        .card-list {
            margin: 15px;
        }
        .btn-sm {
            float: middle !important;
            color: blue;
            background-color: #fff;
        }
        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
            
        }
        .navbar {
            display: flex;
            justify-content: center;
        }
        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="">Book Management System</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="books.php">Books <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                
                <?php
                if(isset($_SESSION['username'])){
                    echo '<li class="nav-item"><a class="nav-link" href="">Welcome '.$_SESSION['username'].'</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
                }
                else{
                    echo '<li class="nav-item"><a class="nav-link" href="../pages/login.html">Sign In</a></li>';        
                }
                ?>
            </ul>
        </div>
    </nav>

    <div class="main-panel">
        <div class="container-fluid">
            <div class="row">
                <div class="side-bar ml-5 mt-5 col-md-3">
                    <h3>Book Categories</h3><hr>
                    <div class="card border-0">
                        <button onclick="load_books(0)" class="btn btn-outline-secondary category-filter-link active" autofocus="autofocus" data-category="All" id="categoryAll">All Books</button>
                        <button onclick="load_books(1)" class="btn mt-1 btn-outline-secondary category-filter-link" data-category="Fiction" id="categoryFiction">Fiction</a>
                        <button onclick="load_books(2)" class="btn mt-1 btn-outline-secondary category-filter-link" data-category="Fantasy" id="categoryFantasy">Fantasy</a>
                        <button onclick="load_books(3)" class="btn mt-1 btn-outline-secondary category-filter-link" data-category="Romance" id="categoryRomance">Romance</a>
                        <button onclick="load_books(4)" class="btn mt-1 btn-outline-secondary category-filter-link" data-category="Science Fiction" id="categoryScienceFiction">Science Fiction</a>
                    </div>
                </div>

                <div class="main-content ml-5 mt-5 col-md-8">
                    <div class="card card-content">
                        <div class="d-flex justify-content-between mt-3">
                            <!-- Modal -->
                            <button type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#addBookModal">&#10010; Add Book </button>
                            <!-- Modal Form -->
                            <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBook" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addBook">Add Book Form</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../server/add_book.php" method="POST" class="add-form" enctype="multipart/form-data">
                                                <div class="form-group" hidden>
                                                    <label for="tbl_book_id">Book ID</label>
                                                    <input type="text" class="form-control" id="bookID" name="tbl_book_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookImage">Book Image</label>
                                                    <input type="file" class="form-control-file" id="bookImage" name="book_image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookTitle">Book Title</label>
                                                    <input type="text" class="form-control" id="bookTitle" name="book_title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookCategory">Category</label>
                                                    <select class="form-control" name="book_category" id="bookCategory">
                                                        <option value="">- select -</option>                                               
                                                        <option value="1">Fiction</option>
                                                        <option value="2">Fantasy</option>
                                                        <option value="3">Romance</option>
                                                        <option value="4">Science Fiction</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookAuthor">Book Author(s)</label>
                                                    <input type="text" class="form-control" id="bookAuthor" name="book_author">
                                                </div>                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-dark">Add Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- View Modal -->
                            <div class="modal fade" id="viewBookDetailsModal" tabindex="-1" aria-labelledby="viewBook" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewBook">Book Full Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="view-form">
                                                <div class="form-group text-center">
                                                    <h4 class="viewBookTitle"></h4>
                                                    <img id="viewBookImage" class="card-img-top mt-2" alt="book" style="width:200px">
                                                </div>
                                                <div class="form-group text-center">
                                                    <i>Category: </i><i class="viewBookCategory"></i><br>
                                                    <h6 class="viewBookAuthor"></h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#updateBookModal">Update Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Update Book Modal -->
                            <div class="modal fade" id="updateBookModal" tabindex="-1" aria-labelledby="updateBook" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateBook">Update Book Form</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../server/update_book.php" method="POST" class="add-form" enctype="multipart/form-data">
                                                <div class="form-group" hidden>
                                                    <label for="updateBookID">Book ID</label>
                                                    <input type="text" class="form-control" id="updateBookID" name="tbl_book_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="updateBookImage">Book Image</label>
                                                    <input type="file" class="form-control-file" id="updateBookImage" name="book_image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="updateBookTitle">Book Title</label>
                                                    <input type="text" class="form-control" id="updateBookTitle" name="book_title">
                                                </div>
                                                <div class="form-group">                                                    
                                                    <label for="updateBookCategory">Category</label>
                                                    <select class="form-control" name="book_category" id="updateBookCategory">
                                                        <option value="">- select -</option>                                               
                                                        <option value="1">Fiction</option>
                                                        <option value="2">Fantasy</option>
                                                        <option value="3">Romance</option>
                                                        <option value="4">Science Fiction</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookAuthor">Book Author(s)</label>
                                                    <input type="text" class="form-control" id="updateBookAuthor" name="book_author">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-dark">Update Book</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form class="form-inline justify-content-end mr-3">
                                <input class="form-control mr-sm-2" id="searchInput" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                        <div class="row book-list">
                            <!-- Load Books from AJAX call here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>