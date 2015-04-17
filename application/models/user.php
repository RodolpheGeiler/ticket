<?php
Class User extends CI_Model
{
 public function login($username, $password)
 {
   $this -> db -> select('utilisateurs_id, utilisateurs_nom, utilisateurs_motdepasse, utilisateurs_grade, utilisateurs_mail, utilisateurs_id');
   $this -> db -> from('Utilisateurs');
   $this -> db -> where('utilisateurs_nom', $username);
   $this -> db -> where('utilisateurs_motdepasse', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>