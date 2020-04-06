<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <div class="col-md-3" id="logo">
                    <a class="navbar-brand js-scroll-trigger" style="margin-left: 15%;" href="#"><img src="../../images/logo.png" alt="logo"/></a>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                </svg>  
                                User
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="#">Dashboard</a>
                              <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row" style="padding-top: 80px;">
            <div class="col-md-2" >
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link active" href="indexPost.php">Manage Post</a>
                    <a class="nav-link" href="../users/indexUsers.php">Manage Users</a>
                    <a class="nav-link" href="../difficulty/indexLevel.php">Manage Difficulty Levels</a>
                    <a class="nav-link" href="../bodyparts/indexBodyPart.php">Manage Body Part</a>
                </nav>
            </div>
            <div class="col-md-9" >
                <a href="createPost.php" class="btn btn-info" id="adminBtn">Add Post</a>
                <a href="indexPost.php" class="btn btn-info" id="adminBtn">Manage Post</a>
               

            
                <div class="container"> 
                    <div class="card">
                        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Manage Posts</h3>
                        <div class="card-body">
                            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                                <thead>
                                    <tr>
                                      <th>Col 1</th>
                                      <th>Col 2</th>
                                      <th>Col 3</th>
                                      <th>Col 4</th>
                                      <th>Action</th>
                                      <th>Delete</th>
                                      <th>Publish</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td><a herdf="#" class="edit" >Edit</a></td>
                                    <td><a herdf="#" class="delete" >Delete</a></td>
                                    <td><a herdf="#" class="publish" >Publish</a></td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                  <tr>
                                    <td>row 1-0</td>
                                    <td>row 1-1</td>
                                    <td>row 1-2</td>
                                    <td>row 1-3</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                    <td>Publish</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>  
        </div>     
    </body>
</html>
