<?php

/**
 * User Model
 *
 * @author Chris Keklikopoulos,Billonas
 */
class User extends AppModel
{
      var $name= 'User';
      

      public $validate = array(  
      'username'=>array(  
            'rule'=>'notEmpty',
            'required'=>true,
            'allowEmpty'=>false,  
            'message'=>'Παρακαλούμε πληκτρολογήστε τη διεύθυνση ηλεκτρονικού ταχυδρομείου'  
      ),  
      'password'=>array(  
            'rule'=>'notEmpty',  
            'required'=>true,  
            'allowEmpty'=>false,  
            'message'=>'Παρακαλούμε πληκτρολογήστε το κωδικό σας'  
      )  
      ); 

      function validate_user($data)
      {
         $return = false;
         
         $conditions = array(
             'User.email'=>$data['User']['username'],
          );
         //βρες αν υπάρχει ο χρήστης με το συγκεκριμένο username
         $user = $this->find('first', array('conditions'=>$conditions));

         //εάν υπάρχει
         if(!empty($user))
         {
            //έλενξε τον κωδικό
            if($user['User']['password'] == ($data['User']['password']))
            {
               $return=$user;
            }
         }
         return $return;
      }
}

?>
