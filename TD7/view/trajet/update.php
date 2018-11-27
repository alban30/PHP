<form method="post" action="index.php?controller=trajet&action=<?php echo $target_action;?>">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="depart_id">Depart</label> :
            <input type="text" placeholder="Ex : Montpellier" name="depart" id="depart_id" value="<?php echo htmlspecialchars($t->get('depart'));?>" required/>
        </p>

        <p>
            <label for="arrivee_id">Arrivee</label> :
            <input type="text" placeholder="Ex : perpignan" name="arrivee" id="arrivee_id" value="<?php echo htmlspecialchars($t->get('arrivee'));?>"required/>
        </p>

        <p>
            <label for="date_id">Date</label> :
            <input type="text" placeholder="Ex : 24/12/2018" name="date" id="date_id" value="<?php echo htmlspecialchars($t->get('date'));?>"required/>
        </p>

        <p>
            <label for="nbplaces_id">Nombre Places</label> :
            <input type="number" placeholder="Ex : 5" name="nbplaces" id="nbplaces_id" value="<?php echo htmlspecialchars($t->get('nbplaces'));?>"required/>
        </p>

        <p>
            <label for="prix_id">Prix</label> :
            <input type="number" placeholder="Ex : 299$" name="prix" id="prix_id" value="<?php echo htmlspecialchars($t->get('prix'));?>"required/>
        </p>

        <p>
            <label for="conducteur_id">Conducteur</label> :
            <input type="text" placeholder="Ex : parentl" name="conducteur_login" id="conducteur_id" value="<?php echo htmlspecialchars($t->get('conducteur_login'));?>"required/>
        </p>

        <p>
            <input type="hidden" value="<?php echo static::$object;?>" />
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($t->get('id'));?>" />

            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>