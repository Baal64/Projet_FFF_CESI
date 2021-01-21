<?php 
	//On va chercher les variables de session
	@session_start();
	//ini_set("SMTP", "smtp.neotissimo.com");   // Pour les hébergements mutualisés Windows de OVH	
	if(isset($_SESSION['idUser'])){
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

		//On recupere les parametres dont on a besoin
		$html= stripslashes(json_decode($_POST['html'])); //Le code html inchangé

		if(isset($_POST['filename']) && $_POST['filename']!=null && $_POST['filename']!='')
			$filename= stripslashes($_POST['filename']); //Le nom que l on soutaite donner au fichier afin de l enregistrer
		else
			$filename= 'production_ecrite_'.date_timestamp_get(date_create()); //Le nom du ficher par defaut
		$path = $_POST['pathToPicture'];
		//On creer un nouvel objet dompdf
		$dompdf = new DOMPDF();
		$dompdf->set_paper( 'defaut', "portrait" );		
		//Si on envoi l'orientation en parametre
		if(isset($_POST['orientation']) && $_POST['orientation']!='' && $_POST['orientation']!=NULL)
			$dompdf->set_paper( 'defaut', $_POST['orientation'] );
		//AJOUT DES TAGS NEOTIS
		$html .= '<a class="to_remove" href="http://www.assimo.com" target="_blank" style="position: absolute; top: -30px; left: -30px; text-decoration: underline; color: #DFDFDF">ASSIMO - http://www.assimo.com</a>'.$html_epure;			
		//On charge le contenu html au sein de l objet
		$dompdf->load_html($html);
		//On lance le traitement
		$dompdf->render();
		$dompdf->stream('pdf.pdf',array('Attachment'=>0));
	}
?>