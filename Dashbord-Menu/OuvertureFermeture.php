<?php


include_once 'C:\xampp\desktop\htdocs\Resto_Project\Dashbord-Menu\Classes\OpeningClosingClasses\clsOpeningClose.php';
$list = clsOpeningClose::ListOpCl();

if (isset($_POST['btn']))
{
    if (isset($_POST['open']) && isset($_POST['close']) && isset($_POST['id']) )
    {
        $status = clsOpeningClose::Modify($_POST['id'], $_POST['open'], $_POST['close']);
        header("location:OuvertureFermeture.php");
    }
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

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-face-smile"></span>
                        <span><a href="Dashbord-Menu/Reservations.html">Reservations</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-agenda"></span>
                        <span><a href="Dashbord-Menu/Commandes.html">Commandes</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-clipboard"></span>
                        <span><a href="Dashbord-Menu/Avis.html">Avis</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-folder"></span>
                        <span><a href="Dashbord-Menu/OuvertureFermeture.html">Ouverture/Fermeture</a></span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-time"></span>
                        <span>Timesheet</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="ti-book"></span>
                        <span>Contacts</span>
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

        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-5">

                    <h2 class="">Ouverture/Fermeture</h2>

                    <table class="table table-striped mt-5 ">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Opening</th>
                                <th>Closing</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    foreach($list as $l)
    {
        ?>
                            <form method="post">
                                <tr>
                                    <td> <?=$l['Dy']?></td>
                                    <td> <input class="form-control" name="open" type="time"
                                            value="<?=$l['ouverture']?>">
                                    </td>
                                    <td> <input class="form-control" name="close" type="time"
                                            value="<?=$l['fermeture']?>">
                                    </td>
                                    <td>
                                        <input type="hidden" name="id" value="<?= $l['id'] ?>">
                                        <input name='btn' type="submit" class="btn btn-danger" value="Modify">
                                    </td>
                                </tr>
                            </form>
                            <?php
    }
?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="table-responsive">
        </div>

    </div>

    </div>

</body>

</html>