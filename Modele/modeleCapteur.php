<?php

require('../else/connexionDB.php');


/*$rek=$conn->prepare("SELECT * FROM personne");
$rek->execute();
echo'<br>';

$data=$rek->fetch();
print_r($data);*/

?>


<?php

function getNom() {
    require('../else/connexionDB.php');
    $requ=$conn->prepare("SELECT * FROM actionneur");
    $requ->execute();
    echo'<br>';
    while($data=$requ->fetch())
    {
        echo $data['command'];
        echo'<br>';
    }
    echo'done';
    $requ->closeCursor();
}

$donnee=getNom();





