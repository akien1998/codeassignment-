<?php 
$filepata = realpath(dirname(__FILE__));
include_once($filepata.'/../lib/database.php');
include_once($filepata.'/../helps/format.php');
 ?>
<?php 
class user
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
}
 ?>