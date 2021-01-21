<?php 
		include("dompdf_config.inc.php");
		//On recupere les parametres dont on a besoin
		$html= stripslashes($_POST['html']); //Le code html inchangé

		$type = "pdf";
		//On creer un nouvel objet dompdf
		$dompdf = new DOMPDF();
		$dompdf->set_paper( 'defaut', "landscape" );	
		$dompdf->load_html($html);
		//On lance le traitement
		$dompdf->render();
		//On genere le contenu du fichier de sortie
		$pdfoutput = $dompdf->output();

		//On le creer physiquement sur le serveur
		$fp = fopen("./PDF.pdf", "w");
		//On l ecrit le contenu dans le fichier cree et on l enregistre
		fwrite($fp, $pdfoutput);
		fclose($fp);
?>