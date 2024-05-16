<?php
include "classes/controller.class.php";
$control = new Controller();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Adherent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container mt-5">

        <form action="" method="POST">
        <h2 class="mt-5">Add Adherent</h2>

            <div class="form-group">
                <label for="Nom">Nom:</label>
                <input type="text" class="form-control" id="Nom" name="Nom" required>

                <label for="Prenom">Prenom:</label>
                <input type="text" class="form-control" id="Prenom" name="Prenom" required>
            </div>
            <button type="submit" class="btn btn-success" name="addBtn">Submit</button>
        </form>

        <?php 

if (isset($_POST['addBtn'])) {
    $Nom = htmlspecialchars($_POST['Nom']);
    $Prenom = htmlspecialchars($_POST['Prenom']);
    $control->addUser($Nom, $Prenom);
    echo "<div id='searchResult' class='mt-3 alert alert-success'>Added: {$Nom} {$Prenom}</div>";

}

 ?>
        <hr>
<!-- ----------------------------------------------------------------------- -->
        <form action="" method="POST">

        <h2 class="mt-5">Search Adherents</h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="searchNumAd">Search by NumAd:</label>
                    <input type="text" class="form-control" id="searchNumAd" name="searchNumAd" required>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary mt-4" name="searchBtn">Search</button>
                </div>
            </div>
        </form>

        <?php
        
        if (isset($_POST['searchBtn'])) {
            $NumAd = htmlspecialchars($_POST['searchNumAd']);
            $user = $control->searchUser($NumAd);
            if ($user !== null) {
                $Nom = $user["Nom"];
                $Prenom = $user["Prenom"];
                echo "<div id='searchResult' class='mt-3 alert alert-success'><i class='fas fa-magnifying-glass'></i>
                Found: {$Nom} {$Prenom}</div>";
            }
            else {

                echo ' <div id="searchResult" class="mt-3 alert alert-danger"> Not Found </div>';
            }
        }
        ?>

<hr>

        <form action="" method="POST">
        <h2 class="mt-5">Delete Adherents</h2>

            <div class="form-group mt-4">
                <label for="deleteNumAd">Delete Adherent by NumAd:</label>
                <input type="text" class="form-control" id="deleteNumAd" name="deleteNumAd" required>
            </div>
            <button type="submit" name="deleteBtn" class="btn btn-danger">Delete Adherent</button>


        </form>

        <?php
        
        if (isset($_POST['deleteBtn'])) {
            $NumAd = htmlspecialchars($_POST['deleteNumAd']);
            $user = $control->searchUser($NumAd);
            if ($user !== null) {
                $Nom = $user["Nom"];
                $Prenom = $user["Prenom"];
                $control->removeUser($NumAd);
                echo "<div id='searchResult' class='mt-3 alert alert-success'><i class='fas fa-trash'></i>
                 Deleted: {$Nom} {$Prenom}</div>";
            }
            else {
                echo ' <div id="searchResult" class="mt-3 alert alert-danger"> Not Found </div>';
            }
        }
        ?>

<hr>

<form action="" method="POST">
        <h2 class="mt-5 mb-3">Show Adherents</h2>
        <button type="submit" name="showBtn" class="btn btn-primary">Show all Adherent</button>

            <table class="table mt-4">
                <thead>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                </thead>
        <tbody>
            <?php
            if (isset($_POST['showBtn'])) {
                echo $control->getUsers();
            }
            ?>
        </tbody>
            </table>


        </form>


    </div>
</body>
</html>
