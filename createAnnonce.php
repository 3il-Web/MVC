
    <?php
    require_once('annonce.php');
    require('structure.php');
    $s = new structure();

    if (isset($_POST['titre']) AND isset($_POST['contenu']) AND $_POST['structure_id']) {
        $art = new annonce();
        $art->nouvelle_annonce($_POST['titre'], $_POST['contenu'], $_POST['media'], $_POST['structure_id']);
        echo "L'annonce a bien été ajoutée";
        echo "<br>";
    }
    ?>

<div class="container">
    <h3>Vous souhaitez déposer une annonce ? Remplissez le formulaire ci-dessous pour publier <u>nouvelle annonce</u> :</h3><br>
        <form method="post" >
            <div class="row">
                <div class="col-75">
                    <input type="text" name="titre" placeholder="Titre de l'annonce.." required><!--permet d'empêcher l'envoi du formulaire si le champ est vide-->
                </div>
            </div>
            <div class="row">
                <div class="col-75">
                    <textarea name="contenu" placeholder="Description de l'annonce.." style="height: 200px; width:100%;" required> </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-75">
                    <select name="structure_id" required>
                        <option value="">Selectionner une structure</option>
                        <?php foreach($s->list() as $k => $v): ?>
                        <option value="<?= $v['id'] ?>"><?= $v['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-75">
                    <input type="text" name="media" placeholder="Url photo.."required>
                </div>
            </div><br>
            <div class="row">
                <input type="submit" name="valider "value="Valider" style="padding: 12px 12px;"> <?= @$error ?>
            </div>
        </form><br>
</div>
