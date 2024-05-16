<?php
include "database/dbh.class.php";
class Controller extends Dbh
{

    public function getUsers()
    {
        $result = $this->executeQ("SELECT * FROM adherent");
        $tr = "";
        while ($row = $result->fetch()) {
            $tr .= "<tr>
            <td> {$row['NumAd']} </td>
            <td> {$row['Nom']} </td>
            <td> {$row['Prenom']} </td>
            </tr>";
        }
        return $tr;
    }
    public function addUser($y, $z)
    {
            try {
                $this->executeQ("INSERT INTO adherent (Nom, Prenom) VALUES ('$y', '$z')");
            } catch (PDOException $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    

    public function searchUser($x)
    {
        try {
            $result = $this->executeQ("SELECT * FROM adherent WHERE NumAd = '$x'");
            if ($result->rowCount() > 0) {
                $result = $result->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function removeUser($x)
    {
        if ($this->searchUser($x) !== null) {
            try {
                $this->executeQ("DELETE FROM adherent WHERE NumAd = '$x'");
            } catch (PDOException $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }
}
