<?
include_once "../bd/database.php";
class Tema
{
     
     public function __construct()
     {
          $db=new Database();

          //Obtenemos la instancia de la BD
          $db->getConnection();
     }
 
     public function lista()
     {          
          //ejecutamos una query cualquiera ...
          $sql = "SELECT * FROM tema LIMIT 10";
          $result = $this->db->query($sql);
          //obtenemos los resultados
          // ....
          return $result;
     }
 
}
?>