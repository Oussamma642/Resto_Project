<?php

include_once 'Classes/UserClasses/clsListUsers.php';
include_once 'Classes/UserClasses/clsAddNewUser.php';

session_start();

//Object's Instantiation of the Login user ;
$currUser = $_SESSION['currUser'];

// Get List Of Users
$LstUsers = clsListUsers::ListUsers();

// Show The status of the deleted user
if (isset($_SESSION['deleteStatus'])) 
{
    // Retrieve the message from the session
    $message = $_SESSION['deleteStatus'];

    // Display the message in a JavaScript alert
    echo "<script type='text/javascript'>alert('$message');</script>";

    // Clear the message after displaying it so it doesn't show again on refresh
    unset($_SESSION['deleteStatus']);
}

//When Click on Add User button
if (isset($_POST['addUserBtn']))
{
    
    clsAddNewUser::AddNewUser();
    // Shof, F kolla input permission dir une valeur binary
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header mt-3">
            <h3 class="brand">
                <span class="ti-unlink"></span>
                <span>easywire</span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        <!-- Sidebar Content -->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="./Home.html">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="Reservations.php">
                        <span class="ti-face-smile"></span>
                        <span>Reservations</span>
                    </a>
                </li>
                <li>
                    <a href="Dashbord-Menu/Orders.php">
                        <span class="ti-agenda"></span>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="Dashbord-Menu/MenuPlats.html">
                        <span class="ti-clipboard"></span>
                        <span>Menu Plats</span>
                    </a>
                </li>
                <li>
                    <a href="Dashbord-Menu/Avis.html">
                        <span class="ti-clipboard"></span>
                        <span>Avis</span>
                    </a>
                </li>
                <li>
                    <a href="Dashbord-Menu/Contact.html">
                        <span class="ti-book"></span>
                        <span>Contact</span>
                    </a>
                </li>
                <li>
                    <a href="Dashbord-Menu/OuvertureFermeture.html">
                        <span class="ti-folder"></span>
                        <span>Ouverture/Fermeture</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-settings"></span>
                        <span>Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h3 class="mt-3" style="padding-left: 30%;">Welcome
                <?=$currUser->getLastName() . ' ' . $currUser->getFirstName()?></h3>
        </header>

        <main>
            <h3 class="text-center">List Of Users</h3>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Phone Number</th>
                                    <th>Delete User</th>
                                    <th>Modify User</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($LstUsers as $usr) { ?>
                                <tr>
                                    <td><?= $usr['first_name'] ?></td>
                                    <td><?= $usr['last_name'] ?></td>
                                    <td><?= $usr['email'] ?></td>
                                    <td><?= $usr['password'] ?></td>
                                    <td><?= $usr['phone_number'] ?></td>
                                    <td><a onclick="return confirm('Are you sure you want to delete this user?');"
                                            href="Classes/UserClasses/clsDeleteUser.php?id=<?=$usr['user_id']?>"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                    <td>
                                        <button style="width: 100%" type="button" class="btn btn-danger"
                                            data-toggle="modal" data-target="#modifyModal"
                                            onclick="populateForm(<?= htmlspecialchars(json_encode($usr)) ?>)">
                                            Modify
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">

                        <button style="width:100%" type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#addUserModal">
                            Add User
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add User Modal -->
    <div class=" modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" method="post">
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="newFirstName"><b>First Name:</b></label>
                            <input type="text" class="form-control" id="newFirstName" name="firstName" required>
                        </div>
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="newLastName"><b>Last Name:</b></label>
                            <input type="text" class="form-control" id="newLastName" name="lastName" required>
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="newEmail"><b>Email:</b></label>
                            <input type="email" class="form-control" id="newEmail" name="email" required>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="newPassword"><b>Password:</b></label>
                            <input type="password" class="form-control" id="newPassword" name="password" required>
                        </div>
                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="newPhoneNumber"><b>Phone Number:</b></label>
                            <input type="tel" class="form-control" id="newPhoneNumber" name="phoneNumber" required>
                        </div>

                        <!-- Permissions -->
                        <div class="form-group">
                            <label><b>Permissions:</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission1"
                                    id="permission1">
                                <label class="form-check-label" for="permission1">Reservation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Orders</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Dishes
                                    Menu</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Users</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Comments
                                    Section</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Contact</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Opening/Closing
                                    Times</label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="addUserBtn" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modify Modal -->
    <div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyModalLabel">Modify User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modifyForm" method="post">
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="firstName"><b>First Name:</b></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="lastName"><b>Last Name:</b></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email"><b>Email:</b></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password"><b>Password:</b></label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="phoneNumber"><b>Phone Number:</b></label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                        </div>
                        <!-- Permissions -->
                        <div class="form-group">
                            <label><b>Permissions:</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission1"
                                    id="permission1">
                                <label class="form-check-label" for="permission1">Reservation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Orders</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Dishes
                                    Menu</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Users</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Comments
                                    Section</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Contact</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="permission2"
                                    id="permission2">
                                <label class="form-check-label" for="permission2">Opening/Closing
                                    Times</label>
                            </div>

                        </div>
                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Populate Form -->
    <script>
    function populateForm(user) {
        document.getElementById('firstName').value = user.first_name;
        document.getElementById('lastName').value = user.last_name;
        document.getElementById('email').value = user.email;
        document.getElementById('password').value = user.password;
        document.getElementById('phoneNumber').value = user.phone_number;
        // Further logic to populate permissions if needed
    }
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>