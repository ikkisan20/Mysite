<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hops Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
    <div class="nav">
        <div class="logo"><img src="./image/kirby.gif" alt="Logo" width="90" height="70">HOPS..</div>
            <ul class="navItems">

                <li><a href="./home.php">Home</a></i></li>
                <li><a href="#">Crud</a></li>
                <li><a href="php/logout.php"><button class="btn">Log out</button></a></li>
            </ul>
        </div>
    </div>

   <!-- Add User -->
<div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveUser">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Violation</label>
                    <input type="text" name="violation" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Stats</label>
                    <input type="text" name="stats" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save User</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateUser">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="user_id" id="user_id" >

                <div class="mb-3">
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Violation</label>
                    <input type="text" name="violation" id="violation" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Stats</label>
                    <input type="text" name="stats" id="stats" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View User Modal -->
<div class="modal fade" id="userViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Username</label>
                    <p id="view_username" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <p id="view_email" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Violation</label>
                    <p id="view_violation" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Stats</label>
                    <p id="view_stats" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users Violation Tracker
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#userAddModal">
                            Add User
                        </button>
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Violation</th>
                                <th>Stats</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require './php/config.php';

                            $query = "SELECT * FROM crud";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $user)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['violation'] ?></td>
                                        <td><?= $user['stats'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$user['id'];?>" class="viewUserBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$user['id'];?>" class="editUserBtn btn btn-success btn-sm">Edit</button>

                                            <button type="button" value="<?=$user['id'];?>" class="deleteUserBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#saveUser', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_user", true);

            $.ajax({
                type: "POST",
                url: "./php/code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#userAddModal').modal('hide');
                        $('#saveUser')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editUserBtn', function () {

            var user_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "./php/code.php?user_id=" + user_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#user_id').val(res.data.id);
                        $('#username').val(res.data.username);
                        $('#email').val(res.data.email);
                        $('#violation').val(res.data.violation);
                        $('#stats').val(res.data.stats);

                        $('#userEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updateUser', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_user", true);

            $.ajax({
                type: "POST",
                url: "./php/code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#userEditModal').modal('hide');
                        $('#updateUser')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewUserBtn', function () {

            var user_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "./php/code.php?user_id=" + user_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_username').text(res.data.username);
                        $('#view_email').text(res.data.email);
                        $('#view_violation').text(res.data.violation);
                        $('#view_stats').text(res.data.stats);

                        $('#userViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteUserBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var user_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "./php/code.php",
                    data: {
                        'delete_user': true,
                        'user_id': user_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });

    </script>
</body>
</html>