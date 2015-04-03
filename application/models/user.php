<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('users_id, users_nom, users_password, grades_id, users_mail, users_id');
   $this -> db -> from('Users');
   $this -> db -> where('users_nom', $username);
   $this -> db -> where('users_password', MD5($password));
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