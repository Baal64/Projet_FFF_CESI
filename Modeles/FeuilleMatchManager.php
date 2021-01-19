<? php
class FeuilleMatchManager{

    private $db;

    public function __construct($lieu, $date){
        $this->db = new PDO('mysql:host=localhost;dbname=fff;charset=utf8','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
} 
?>