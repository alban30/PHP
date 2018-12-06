<form method="<?php echo $method; ?>" action="index.php?controller=utilisateur&action=<?php echo $target_action;?>">
        <fieldset>
                <legend>Mon formulaire :</legend>
                <p>
                        <label for="login_id">Login</label> :
                        <input type="text" placeholder="Ex : JP" name="login" id="login_id" value="<?php echo htmlspecialchars($u->get("login"));?>" <?php echo $modifier; ?>/>
                </p>

                <p>
                        <label for="nom_id">Nom</label> :
                        <input type="text" placeholder="Ex : Chaudron" name="nom" id="nom" value="<?php echo htmlspecialchars($u->get("nom"));?>" required/>
                </p>

                <p>
                        <label for="prenom_id">Prenom</label> :
                        <input type="text" placeholder="Ex : Jean Pierre" name="prenom" id="prenom" value="<?php echo htmlspecialchars($u->get("prenom"));?>" required/>
                </p>

                <p>
                        <label for="email">Email</label> :
                        <input type="email" placeholder="hello@gmail.com" name="email" id="email" required/>
                </p>

                <p>
                        <label for="mdp">Mot de passe</label> :
                        <input type="password" placeholder="********" name="mdp" id="mdp" required/>
                </p>

                <p>
                        <label for="mdpc">Confirmation</label> :
                        <input type="password" placeholder="********" name="mdpc" id="mdpc" required/>
                </p>

                <?php
                if(Session::is_admin()) {
                        echo <<< EOT
                        <p>
                            <label for="admin">Administrateur</label> :
                            <input type="checkbox" name="admin" id="admin" value="admin">
                        </p>
EOT;
                }
                ?>

                <p>
                    <input type="hidden" value="<?php echo static::$object;?>" />
                    <input type="submit" value="Envoyer" />
                </p>
        </fieldset>
</form>
