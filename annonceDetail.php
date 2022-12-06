<?php

$result = $pdo->query($sql);
?>
       
<?php

/* Ajoute l'offre de l'annonce */
for ($i = 0; $i < $result->rowCount(); $i++) {
    /* Creer les boutons des differents instruments */
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
?>


            <div class="Structure">

         <div class="offre">
            <p>Catégorie de l'offre :  <?php echo $_POST["search"]; ?></p>
            
        </div><br>
                <div class="test">
                    <div class="imgStructure">
                        <img class="imageDetaille" src="img/Structure1.jpg" alt="">
                    </div>
                    <div class="nomStructure">
            <?php
            echo $row["nom"];

            echo '<div class="infoStructure">';
            echo '<p>• Adresse : ' . $row["ville"] . '</p>';

            echo '<p>• Tel : ' . $row["tel"] . '</p>';
            echo '<p>• Mail : ' . $row["mail"] . '</p>';
            echo '<p>• Site : <a href="' . $row["site"] . '">' . $row["site"] . '</a></p>';

            echo '</div></div> </div> </div>';
        }
        ?>
                    <?php
    }
}




            ?>