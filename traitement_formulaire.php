<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// expéditeur du formulaire. Pour des raisons de sécurité, de plus en plus d'hébergeurs imposent que ce soit une adresse sur votre hébergement/nom de domaine.
// Par exemple si vous mettez ce script sur votre site "test-site.com", mettez votre email @test-site.com comme expéditeur (par exemple contact@test-site.com)
// Si vous ne changez pas cette variable, vous risquez de ne pas recevoir de formulaire.
if (isset($_POST['nom']))
{
	$nom_expediteur = $_POST['nom'];
}


$email_expediteur = 'contact@mano-quere.com';
$nom_expediteur = 'Contact Portfolio';

// destinataire est votre adresse mail (cela peut être la même que cl'expéditeur ci-dessus). Pour envoyer à plusieurs destinataires à la fois, séparez-les par un point-virgule
$destinataire = 'contact@mano-quere.com';
$mail_orange = 'mano.quere@orange.fr';

// copie ? (envoie une copie au visiteur)
$copie = 'oui'; // 'oui' ou 'non'

// Messages de confirmation du mail
$message_envoye = "Votre message nous a bien été envoyé, vous allez en recevoir une copie";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

// Messages d'erreur du formulaire
$message_erreur_formulaire = "Vous devez d'abord <a href=\"index.php#contact\">envoyer le formulaire</a>.";
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/

// on teste si le formulaire a été soumis
if (!isset($_POST['envoi']))
{ ?>
            <?php require_once __DIR__ . "/layout/header.php"; ?>
                <section class="page-section">
                    <div class="container-fluid text-center" style="width: auto; margin-top:15%">
                        <h2 style="color: #cc1c35;">Votre email n'a pas été envoyé</h2>
                        <h3>Merci de réessayer</h3>
                        <div class="text-center mt-5 mb-5">
							<a class="btn btn-primary btn-xl" href="index.php">Retour</a>
						</div>
                    </div>
                </section>
<?php }
else
{
	/*
	 * cette fonction sert à nettoyer et enregistrer un texte
	 */
	function Rec($text)
	{
		$text = htmlspecialchars(trim($text), ENT_QUOTES);
		if (1 === get_magic_quotes_gpc())
		{
			$text = stripslashes($text);
		}

		$text = nl2br($text);
		return $text;
	};

	/*
	 * Cette fonction sert à vérifier la syntaxe d'un email
	 */
	function IsEmail($email)
	{
		$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
		return (($value === 0) || ($value === false)) ? false : true;
	}

	// formulaire envoyé, on récupère tous les champs.
	$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
	$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
	$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
	$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

	// On va vérifier les variables et l'email ...
	$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré

	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From:'.$nom_expediteur.'<'.$email_expediteur.'>' .'<'.$mail_orange.'>'. "\r\n" .
				'Reply-To:'.$email. "\r\n" .
				'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
				'Content-Disposition: inline'. "\r\n" .
				'Content-Transfer-Encoding: 7bit'." \r\n" .
				'X-Mailer:PHP/'.phpversion();

		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.';'.$email.';'.$mail_orange;
		}
		else
		{
			$cible = $destinataire;
		};

		// Remplacement de certains caractères spéciaux
		$caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '…',   '&rsquo;', '&lsquo;');
		$caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<'     );

		$objet = html_entity_decode($objet);
		$objet = str_replace($caracteres_speciaux, $caracteres_remplacement, $objet);

		$message = html_entity_decode($message);
		$message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);

		// Envoi du mail
		$cible = str_replace(',', ';', $cible); // antibug : j'ai vu plein de forums où ce script était mis, les gens ne font pas attention à ce détail parfois
		$num_emails = 0;
		$tmp = explode(';', $cible);
		foreach($tmp as $email_destinataire)
		{
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;
		}

		if ((($copie == 'oui') && ($num_emails == 3)) || (($copie == 'non') && ($num_emails == 2)))
		{?>
            <?php require_once __DIR__ . "/layout/header.php"; ?>
			<section class="page-section">
                    <div class="container-fluid text-center" style="width: auto; margin-top:15%">
                        <h2 style="color: #309930;">Votre email a bien été envoyé</h2>
                        <h3>Vous allez recevoir une copie sur votre boite mail</h3>
                        <div class="text-center mt-5 mb-5">
							<a class="btn btn-primary btn-xl" href="index.php">Retour</a>
						</div>
                    </div>
            </section>
            
		<?php } 
		else
		{ ?>
			<?php require_once __DIR__ . "/layout/header.php"; ?>
                <section class="page-section">
                    <div class="container-fluid text-center" style="width: auto; margin-top:15%">
                        <h2 style="color: #cc1c35;">Votre email n'a pas été envoyé</h2>
                        <h3>Merci de réessayer</h3>
                        <div class="text-center mt-5 mb-5">
							<a class="btn btn-primary btn-xl" href="index.php">Retour</a>
						</div>
                    </div>
                </section>
            <?php }; 
	}
	else
	{?>
		<?php require_once __DIR__ . "/layout/header.php"; ?>
            <section class="page-section">
                <div class="container-fluid text-center" style="width: auto; margin-top:15%">
                    <h2 style="color: #cc1c35;">Formulaire incomplet</h2>
                    <h3>Merci de réessayer</h3>
					<div class="text-center mt-5 mb-5">
							<a class="btn btn-primary btn-xl" href="index.php">Retour</a>
						</div>
                </div>
            </section>
        <?php };
}; // fin du if (!isset($_POST['envoi']))
?>