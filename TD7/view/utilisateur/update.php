<form method="post" action="index.php?controller=utilisateur&action=<?php echo $target_action;?>">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="login_id">Login</label> :
      <input type="text" placeholder="Ex : JP" name="login" id="login_id" value="<?php echo htmlspecialchars($u->getLogin());?>" <?php echo $modifier; ?>/>
    </p>

    <p>
      <label for="nom_id">Nom</label> :
      <input type="text" placeholder="Ex : Chaudron" name="nom" id="nom" value="<?php echo htmlspecialchars($u->getNom());?>" required/>
    </p>

    <p>
      <label for="prenom_id">Prenom</label> :
      <input type="text" placeholder="Ex : Jean Pierre" name="prenom" id="prenom" value="<?php echo htmlspecialchars($u->getPrenom());?>" required/>
    </p>

    <p>
      <input type="hidden" value="<?php echo static::$object;?>" />
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset>
</form>
