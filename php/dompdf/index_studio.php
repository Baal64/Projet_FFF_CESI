<?php 
	//On va chercher les variables de session
	
	@session_start();	
	if(isset($_SESSION['idUser']))
	{
		$id_utilisateur = $_SESSION['idUser']; //L utilisateur auquel attacher le fichier
		$id_ecole = $_SESSION['id_ecole']; //L utilisateur auquel attacher le fichier
		$doc_root =  str_replace('/ASSIMO_VX','',$_SERVER['DOCUMENT_ROOT']);	
		//On inclu la libraire dompdf pour la generation de pdf via html/css
		include("dompdf_config.inc.php");		
		include("$doc_root/Constantes/php/chemins_utiles.php");		
		include("$doc_root/Constantes/php/Classes/class_sql.php");	
		//Connexion à la base
		$objsql = new sql();
		
		//Taille des différents templates
		CPDF_Adapter::$PAPER_SIZES['defaut'] = array(0,0,595.28,841.89);
		CPDF_Adapter::$PAPER_SIZES['invitation'] = array(0,0, 8.2677 * 72, 4.2 * 72);
		CPDF_Adapter::$PAPER_SIZES['texte_haiku'] = array(0,0,419.53,595.28);
		CPDF_Adapter::$PAPER_SIZES['babillard'] = array(0,0,470,595.28);
		CPDF_Adapter::$PAPER_SIZES['petite_annonce_affiche'] = array(0,0,450,595.28);
		CPDF_Adapter::$PAPER_SIZES['petite_annonce_vehicule'] = array(0,0,450,595.28);

		if(can_import_or_create_files($id_utilisateur,$id_ecole))
		{
			//On recupere les parametres dont on a besoin
			$html= stripslashes($_POST['html']); //Le code html inchangé
			$html_epure= stripslashes($_POST['html_epure']); //Le code html de la page a convertir en pdf
			if($html_epure == "" || $html_epure == NULL)
				$html_epure = $html;
			//On va chercher de quel template il s'agit
			$template = $_POST['template'];
			//On rajoute quelques éléments (le nom, prénom de l'apprenant, la date...) et un peu de style au html épuré
			if($_POST['display_name']!="false")
				$html_epure .= '<p class="to_remove" style="position: absolute; bottom:-30px;left:-30px;">Fait le : '.date('d/m/Y').', par '.$_SESSION['prenom_utilisateur'].' '.$_SESSION['nom_utilisateur'].'</p>';
			if(isset($_POST['filename']) && $_POST['filename']!=null && $_POST['filename']!='')
				$filename= stripslashes($_POST['filename']); //Le nom que l on soutaite donner au fichier afin de l enregistrer
			else
				$filename= 'production_ecrite_'.date_timestamp_get(date_create()); //Le nom du ficher par defaut
			$path = $_POST['pathToPicture'];
			//On va recuperer le type de fichier à enregistrer
			$type = $_POST['type'];
			if($type=='texte')
				$type = "pdf";
			else if($type=='page')
				$type = "pdf_doc";
			else
				$type = "pdf";
			//On creer un nouvel objet dompdf
			$dompdf = new DOMPDF();
			//On lui indique le chemin a prendre pour trouver les images et css si il existe
			if(isset($path) && $path!=null && $path!="")
				$dompdf->set_base_path('../../../Applications/'.$path);
			if(CPDF_Adapter::$PAPER_SIZES[$template]!=NULL && CPDF_Adapter::$PAPER_SIZES[$template]!='')
			{	
				if($template=="texte_haiku" || $template=="babillard" || $template=="petite_annonce_affiche" || $template=="petite_annonce_vehicule")
					$dompdf->set_paper( $template, "landscape" );	
				else
					$dompdf->set_paper( $template, "portrait" );				
			}
			else
			{
				$dompdf->set_paper( 'defaut', "portrait" );		
			}
			//Si on envoi l'orientation en parametre
			if(isset($_POST['orientation']) && $_POST['orientation']!='' && $_POST['orientation']!=NULL)
				$dompdf->set_paper( 'defaut', $_POST['orientation'] );	
			//On charge le contenu html au sein de l objet
			$dompdf->load_html($html_epure);
			//On converti en utf-8 pour lever les erreurs d encodage
			$html_epure = utf8_decode($html_epure);
			//On lance le traitement
			$dompdf->render();
			//On genere le contenu du fichier de sortie
			$pdfoutput = $dompdf->output();
			//On va creer un espace sur le serveur dédié à l'utilisateur pour son stockage personnel
			creer_espace_utilisateur($id_utilisateur);
			//SI IL S AGIT D UNE ACTIVITE
			if(isset($_POST['activite']) && $_POST['activite']>0)
			{
				$type = "activite";
				$filename= 'activite_production_'.date_timestamp_get(date_create());
				//On va inserer dans la base le fait que l'activité a été effectuée par l'apprenant et on va la passer en attente de vérification
				$id_ecole = $_SESSION['id_ecole'];
				$id_activite = $_POST['activite'];
				$statut = 0;
				$date_change_statut = date('Y-m-d');	
				$sql_recup_admin = "SELECT U.idUser FROM users U, ecole E WHERE E.idEcole=$id_ecole AND U.idEcole=E.idEcole AND U.type='admin' LIMIT 1";
				$objsql->query($sql_recup_admin,"Récupération de l'administrateur d'un établissement (dompdf)");
				$res = $objsql->fetch_assoc();
				$id_admin = $res['idUser'];
				$sql = "INSERT INTO activites_production (id_utilisateur,id_activite,statut,date_change_statut,id_admin,nom_production,template) VALUES ($id_utilisateur,$id_activite,$statut,'$date_change_statut',$id_admin,'$filename','$template')";
				$objsql->query($sql,"Ajout dans activites_production (dompdf)");
			}
			//On va regarder si le fichier n'existe pas déjà (pour ne pas l'ajouter à nouveau dans le JSON)
			$file_exists = file_exists ($Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.pdf");
			//On le creer physiquement sur le serveur
			$fp = fopen($Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.pdf", "w");
			//On l ecrit le contenu dans le fichier cree et on l enregistre
			fwrite($fp, $pdfoutput);
			fclose($fp);
			//On va créer une vignette du pdf précédemment créé
			//LOCAL
			//$comd="PATH=$PATH:~/opt/bin&&convert -density 196 ".$Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.pdf[0] -background white -flatten -resample 72 -thumbnail 256 ".$Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.jpg";
			//EN LIGNE
			//$comd="~/opt/bin&&convert -density 196 ".$Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.pdf[0] -background white -flatten -resample 72 -thumbnail 256 ".$Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.jpg";
			$comd="convert -density 196 ".$Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.pdf[0] -background white -flatten -resample 72 -thumbnail 256 ".$Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.jpg";
			exec($comd);
			//-------AUSSI EN HTML POUR UNE MODIFIICATION ULTERIEURE-------
			//On le creer physiquement sur le serveur
			$fp = fopen($Ficher_utilisateurs.$id_utilisateur."/productions/pdf/$filename.html", "w");
			//On l ecrit le contenu dans le fichier cree et on l enregistre
			fwrite($fp, utf8_encode($html_epure));
			fclose($fp);
			//Enfin, on va ajout la production au json de l'apprenant, listant l'ensemble de ses productions
			if(!$file_exists)
			{
				$jsonString = file_get_contents($Ficher_utilisateurs.$id_utilisateur."/productions/JSON_$id_utilisateur.json");
				$data = json_decode($jsonString);
				array_push($data,array("type"=>"$type","nom"=>$filename,"template"=>$template,"lien"=>$url_path_users_files.$id_utilisateur."/productions/pdf/$filename.pdf","image"=>$url_path_users_files.$id_utilisateur."/productions/pdf/$filename.jpg"));
				$json = json_encode($data);
				file_put_contents($Ficher_utilisateurs.$id_utilisateur."/productions/JSON_$id_utilisateur.json", $json);
			}
			if(isset($_POST['id_resultat']))
			{
				$date_change_statut = date('Y-m-d');
				$sql = "UPDATE productions_grain SET prod_name='$filename', date_change_statut='$date_change_statut', statut=1, commentaire='' WHERE id_res=".$_POST['id_resultat'];
				$objsql->query($sql,"Ajout dans productions_grain (dompdf)");
				$sql = "UPDATE resultats SET reussi=0,erreurs=-1 WHERE id=".$_POST['id_resultat'];
				$objsql->query($sql,"Modification de l'erreur à -1 pour signifier qu'il est en attente de validation (dompdf)");
			}
		}
		else
		{
			echo "0";
		}
	}
?>