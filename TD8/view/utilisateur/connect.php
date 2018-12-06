<form method="post" action="index.php?controller=utilisateur&action=<?php echo $target_action;?>">
        <fieldset>
                <legend>Connexion</legend>
                <p>
                        <label for="login_id">Login</label> :
                        <input type="text" placeholder="JP" name="login" id="login_id" required/>
                </p>

                <p>
                        <label for="mdp">Mot de passe</label> :
                        <input type="password" placeholder="********" name="mdp" id="mdp" required/>
                </p>

                <p>
                        <input type="hidden" value="<?php echo static::$object;?>" />
                        <input type="submit" value="Envoyer" />
                </p>
        </fieldset>
</form>
