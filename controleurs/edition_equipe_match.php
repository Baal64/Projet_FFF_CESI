<?php
if(session_status()==PHP_SESSION_NONE)
    session_start();

if(file_exists('../php/fonctions.php'))
    require_once('../php/fonctions.php');
// Fonction de chargement de classe
spl_autoload_register('chargerClass');


if(isset($_POST['select_feuille_match'])){
	$id_match = $_POST['select_feuille_match'];
}

$equipeId = $connected_user['id_equipe_entraineur'];

$joueurManager = new joueurManager();
$joueurCollection = $joueurManager->readByEquipe($equipeId);
$listePostes = array('Avant', 'Ailier', 'Milieu offensif', 'Milieu', 'Milieu défensif', 'Arrière', 'Gardien');

$listePlacements = array('Centre', 'Droit', 'Gauche');

$utilisateur= new UtilisateurManager();

if(isset($_POST['valid_creation_equipe'])){
	$id_match = $_POST['valid_creation_equipe'];

	$capitaine = $_POST['select_capitaine'];
	$poste_capitaine = $_POST['select_poste_capitaine'];
	$placement_capitaine = $_POST['select_plcmt_cpt'];

	$capitaineadj = $_POST['select_capitaine_adj'];
	$poste_capitaineadj = $_POST['select_poste_capitaine_adj'];
	$placement_capitaineadj = $_POST['select_plcmt_cpt_adj'];

	$id_joueur3 = $_POST['select_joueur3'];
	$poste_joueur3 = $_POST['select_poste_j3'];
	$placement_joueur3 = $_POST['select_plcmt_j3'];

	$id_joueur4 = $_POST['select_joueur4'];
	$poste_joueur4 = $_POST['select_poste_j4'];
	$placement_joueur4 = $_POST['select_plcmt_j4'];

	$id_joueur5 = $_POST['select_joueur5'];
	$poste_joueur5 = $_POST['select_poste_j5'];
	$placement_joueur5 = $_POST['select_plcmt_j5'];

	$id_joueur6 = $_POST['select_joueur6'];
	$poste_joueur6 = $_POST['select_poste_j6'];
	$placement_joueur6 = $_POST['select_plcmt_j6'];

	$id_joueur7 = $_POST['select_joueur7'];
	$poste_joueur7 = $_POST['select_poste_j7'];
	$placement_joueur7 = $_POST['select_plcmt_j7'];

	$id_joueur8 = $_POST['select_joueur8'];
	$poste_joueur8 = $_POST['select_poste_j8'];
	$placement_joueur8 = $_POST['select_plcmt_j8'];

	$id_joueur9 = $_POST['select_joueur9'];
	$poste_joueur9 = $_POST['select_poste_j9'];
	$placement_joueur9 = $_POST['select_plcmt_j9'];

	$id_joueur10 = $_POST['select_joueur10'];
	$poste_joueur10 = $_POST['select_poste_j10'];
	$placement_joueur10 = $_POST['select_plcmt_j10'];

	$id_joueur11 = $_POST['select_joueur11'];
	$poste_joueur11 = $_POST['select_poste_j11'];
	$placement_joueur11 = $_POST['select_plcmt_j11'];

	$id_remplacant_1 = $_POST['select_remplacant1'];
	$poste_remplacant_1 = $_POST['select_poste_remplacant1'];

	$id_remplacant_2 = $_POST['select_remplacant2'];
	$poste_remplacant_2 = $_POST['select_poste_remplacant2'];

	$id_remplacant_3 = $_POST['select_remplacant3'];
	$poste_remplacant_3 = $_POST['select_poste_remplacant3'];

	$tab_joueurs_match = [];

	$jm1 = new JoueurMatch();
	$jm1->setid_joueur($capitaine);
	$jm1->setid_match($id_match);
	$jm1->setstatut_match('Titulaire');
	$jm1->setposte_match($poste_capitaine);
	$jm1->setplacement_match($placement_capitaine);
	$jm1->setcapitaine(1);
	$jm1->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm1);

	$jm2 = new JoueurMatch();
	$jm2->setid_joueur($capitaineadj);
	$jm2->setid_match($id_match);
	$jm2->setstatut_match('Titulaire');
	$jm2->setposte_match($poste_capitaineadj);
	$jm2->setplacement_match($placement_capitaineadj);
	$jm2->setcapitaine(0);
	$jm2->setcapitaine_sup(1);
	array_push($tab_joueurs_match, $jm2);

	$jm3 = new JoueurMatch();
	$jm3->setid_joueur($id_joueur3);
	$jm3->setid_match($id_match);
	$jm3->setstatut_match('Titulaire');
	$jm3->setposte_match($poste_joueur3);
	$jm3->setplacement_match($placement_joueur3);
	$jm3->setcapitaine(0);
	$jm3->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm3);

	$jm4 = new JoueurMatch();
	$jm4->setid_joueur($id_joueur4);
	$jm4->setid_match($id_match);
	$jm4->setstatut_match('Titulaire');
	$jm4->setposte_match($poste_joueur4);
	$jm4->setplacement_match($placement_joueur4);
	$jm4->setcapitaine(0);
	$jm4->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm4);

	$jm5 = new JoueurMatch();
	$jm5->setid_joueur($id_joueur5);
	$jm5->setid_match($id_match);
	$jm5->setstatut_match('Titulaire');
	$jm5->setposte_match($poste_joueur5);
	$jm5->setplacement_match($placement_joueur5);
	$jm5->setcapitaine(0);
	$jm5->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm5);

	$jm6 = new JoueurMatch();
	$jm6->setid_joueur($id_joueur6);
	$jm6->setid_match($id_match);
	$jm6->setstatut_match('Titulaire');
	$jm6->setposte_match($poste_joueur6);
	$jm6->setplacement_match($placement_joueur6);
	$jm6->setcapitaine(0);
	$jm6->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm6);

	$jm7 = new JoueurMatch();
	$jm7->setid_joueur($id_joueur7);
	$jm7->setid_match($id_match);
	$jm7->setstatut_match('Titulaire');
	$jm7->setposte_match($poste_joueur7);
	$jm7->setplacement_match($placement_joueur7);
	$jm7->setcapitaine(0);
	$jm7->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm7);

	$jm8 = new JoueurMatch();
	$jm8->setid_joueur($id_joueur8);
	$jm8->setid_match($id_match);
	$jm8->setstatut_match('Titulaire');
	$jm8->setposte_match($poste_joueur8);
	$jm8->setplacement_match($placement_joueur8);
	$jm8->setcapitaine(0);
	$jm8->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm8);

	$jm9 = new JoueurMatch();
	$jm9->setid_joueur($id_joueur9);
	$jm9->setid_match($id_match);
	$jm9->setstatut_match('Titulaire');
	$jm9->setposte_match($poste_joueur9);
	$jm9->setplacement_match($placement_joueur9);
	$jm9->setcapitaine(0);
	$jm9->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm9);

	$jm10 = new JoueurMatch();
	$jm10->setid_joueur($id_joueur10);
	$jm10->setid_match($id_match);
	$jm10->setstatut_match('Titulaire');
	$jm10->setposte_match($poste_joueur10);
	$jm10->setplacement_match($placement_joueur10);
	$jm10->setcapitaine(0);
	$jm10->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm10);

	$jm11 = new JoueurMatch();
	$jm11->setid_joueur($id_joueur11);
	$jm11->setid_match($id_match);
	$jm11->setstatut_match('Titulaire');
	$jm11->setposte_match($poste_joueur11);
	$jm11->setplacement_match($placement_joueur11);
	$jm11->setcapitaine(0);
	$jm11->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jm11);

	$jmremp1 = new JoueurMatch();
	$jmremp1->setid_joueur($id_remplacant_1);
	$jmremp1->setid_match($id_match);
	$jmremp1->setstatut_match('Remplaçant');
	$jmremp1->setposte_match($poste_remplacant_1);
	$jmremp1->setcapitaine(0);
	$jmremp1->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jmremp1);

	$jmremp2 = new JoueurMatch();
	$jmremp2->setid_joueur($id_remplacant_2);
	$jmremp2->setid_match($id_match);
	$jmremp2->setstatut_match('Remplaçant');
	$jmremp2->setposte_match($poste_remplacant_2);
	$jmremp2->setcapitaine(0);
	$jmremp2->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jmremp2);

	$jmremp3 = new JoueurMatch();
	$jmremp3->setid_joueur($id_remplacant_3);
	$jmremp3->setid_match($id_match);
	$jmremp3->setstatut_match('Remplaçant');
	$jmremp3->setposte_match($poste_remplacant_3);
	$jmremp3->setcapitaine(0);
	$jmremp3->setcapitaine_sup(0);
	array_push($tab_joueurs_match, $jmremp3);

	$jmm = new JoueurMatchManager();
	$jmm->createJoueursMatch($tab_joueurs_match);

}

$view = "vue_creation_equipe_match";