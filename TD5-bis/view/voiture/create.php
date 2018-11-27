<form method="post" action="index.php?action=created">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="immat_id">Immatriculation</label> :
      <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/>
    </p>

    <p>
      <label for="immat_id">Marque</label> :
      <input type="text" placeholder="Ex : Renault" name="marque" id="marque" required/>
    </p>

    <p>
      <label for="immat_id">Immatriculation</label> :
      <input type="text" placeholder="Ex : Bleu" name="couleur" id="couleur" required/>
    </p>

    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>
</form>
