<!DOCTYPE html>
<html>
<head><!-- head contient tout ce qui est en entete de la page -->
    <!-- le titre de la page est visible dans les recherches google -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../design.css" />
    <title><?=$piece?></title>
</head>
<body>

<?php
require('../Header.php');
?>

<!-- ajouter tout les infos communes -->



<article>
    <h3><?=$piece?></h3>

    <?php

    $TabCaptPiece=CaptInRoom($id);
    $cursor=0;
    while($cursor<count($TabCaptPiece)){
        ?>
        <p><?=$TabCaptPiece[$cursor]?> : <?=$TabCaptPiece[$cursor+1]?>  <a href="../Controleur/controleurCapteur.php?capteur=<?=$TabCaptPiece[$cursor]?>&IDPiece=<?=$id?>&piece=<?=$piece?>">détails du capteur</a> </p>
    <?php
        $cursor=$cursor+2;
    }
    ?>


    <br/>
    <?php
    $TABHistoTemperature=CreerTableauHistorique('thermometre',$tab);
    ?>
    <p> Historique du capteur de température:</p>
    <table>
        <tr>
            <th>capteur</th>
            <th>valeur</th>
            <th>date</th>
        </tr>

        <?php
        $var=0;
        $var1=count($TABHistoTemperature);
        $var2=30;
        $VAR=min($var1,$var2);    // REFAIRE UNE FONCTION DANS LE CONTROLEUR QUI DYNAMISE LE SYSTEME
        while($var<$VAR) {

                ?>
                <tr>
                    <td><?= $TABHistoTemperature[$var] ?></td>
                    <td><?= $TABHistoTemperature[$var + 1] ?></td>
                    <td><?= $TABHistoTemperature[$var + 2] ?></td>
                </tr>
                <?php
                $var = $var + 3;

        }
        ?>

    </table>

    <br/>
    <br/>
    <p>Ajouter un capteur:</p>
    <form action="../Controleur/controleurCapteur.php?id=<?=$id?>" method="post">
        <label for="nameAjout">nom</label> : <input type="text" name="nameAjout" /><br/>
        <label for="value">Valeur</label> : <input type="number" name="value" /><br/>
        <label for="power">état du capteur (0/1)</label> : <input type="number" name="power" /><br/>
        <label for="HAG">Hag associé</label> : <input type="number" name="HAG" /><br/>
        <input type="submit" value="Envoyer" />
    </form>
    <br/>

    <p>Supprimer un capteur:</p>
    <form action="../Controleur/controleurCapteur.php" method="post">
        <label for="nameSuppr">nom du capteur a supprimer</label> : <input type="text" name="nameSuppr"  /><br/>
        <label for="numberSuppr">numéro du capteur à supprimer</label> : <input type="number" name="numberSuppr" /><br/>
        <input type="submit" value="Envoyer" />
    </form>
    <br/>
    <br/>
    <br/>
    <a href="../Vue/vueAccesPiece.php?Home=Maison 1">retour aux choix de la pièce</a>
    <!-- peu être mettre une photo de la piece/ type de piece -->
    <p>retour au menu</p><!-- a changer en lien -->

</article>



<?php
require('../Footer.php');
?>

</body>

</html>