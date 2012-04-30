<?php

/**
 * User Model
 *
 * @author Chris Keklikopoulos,Billonas
 */
class User extends AppModel
{
      var $name= 'User';
      public $recursive = 2;
      public $hasOne = array(
          'Analyst' => array(
             'className' => 'Analyst',
             'foreignKey' => 'id'
          )
      ); 
      
      public $validate = array(  
      'email'=>array(  
               'rule1'=>array(
                  'rule'=>'notEmpty',
                  'allowempty'=>false,  
                  'message'=>'Παρακαλούμε πληκτρολογήστε τη διεύθυνση ηλεκτρονικού ταχυδρομείου'  
             ),
               'rule2'=>array(
                   'rule'=>array('email', true),
                   'message'=>'Παρακαλούμε δώστε έγκυρή τιμή ηλεκτρονικού ταχυδρομείου'
               ) 
      ),  
      'password'=>array(  
               'rule1'=>array(
                  'rule'=>'notEmpty',
                  'allowempty'=>false,  
                  'message'=>'Παρακαλούμε πληκτρολογήστε τη διεύθυνση ηλεκτρονικού ταχυδρομείου'  
             ),
               'rule2'=>array(
                  'rule'=>array('maxLength', 45),
                  'message'=>'Ο κωδικός σας δεν μπορεί να περιέχει παραπάνω από 45 χαρακτήρες'  

             ),
               'rule3'=>array(
                  'rule'=>array('minlength', 8),
                  'message'=>'Ο κωδικός σας δεν μπορεί να περιέχει λιγότερους από 8 χαρακτήρες'  

             ),
               
      ),  
      'passwordConfirm'=>array(  
               'rule1'=>array(
                  'rule'=>'notEmpty',
                  'allowEmpty'=>false,  
                  'message'=>'Παρακαλούμε επιβεβαιώστε τον κωδικό που επιθυμείτε να χρησιμοποείτε'  
             ),
               'rule2'=>array(
                  'rule'=>array('confirmPassword'),
                  'message'=>'Ο κωδικός επιβεβαίωσης και ο κωδικός σας δεν ταιριάζουν'  
             )
      ),
          //TODO:με τον τελευταίο κανόνα(και στο name και στο surname) θέλω να σιγουρέψω
          //ότι ο χρήστης θα δώσει μόνο γράμματα. Τώρα μπορεί να δώσει και αριθμούς. Θα 
          //πρέπει να το φτιάξω στην δεύτερη φάση
      'name'=>array(  
               'rule1'=>array(
                  'rule'=>'notEmpty',
                  'allowempty'=>false,  
                  'message'=>'Παρακαλούμε δώστε το όνομα σας'  
             ),
               'rule2'=>array(
                  'rule'=>array('maxLength', 45),
                  'message'=>'Το όνομα σας δεν μπορεί να περιέχει πάνω από 45 χαρακτήρες'  
             ),
               'rule3'=>array(
                  'rule'=>'alphaNumeric',
                  'message'=>'Το όνομα σας μπορεί να περιέχει μόνο γράμματα'  
             )

      ),
      'surname'=>array(  
               'rule1'=>array(
                  'rule'=>'notEmpty',
                  'allowempty'=>false,  
                  'message'=>'Παρακαλούμε δώστε το επώνυμο σας'  
             ),
               'rule2'=>array(
                  'rule'=>array('maxLength', 45),
                  'message'=>'Το επώνυμο σας δεν μπορεί να περιέχει πάνω από 45 χαρακτήρες'  
             ),
               'rule3'=>array(
                  'rule'=>'alphaNumeric',
                  'message'=>'Το επώνυμο σας μπορεί να περιέχει μόνο γράμματα'  
             )

      ),
      'phone_number'=>array(  
               'rule1'=>array(
                   'rule'=>array('onlyNumbers'),
                   'message'=>'Το τηλέφωνο σας μπορεί να περιέχει μόνο αριθμούς'
             )
      ),
      'birth_date'=>array(  
               'rule1'=>array(
                   'rule'=>array('date', 'ymd'),
                   'message'=>'Η ημερομηνία πρέπει να μπει στη μορφή yyyy-mm-dd(π.χ:2011-11-20)'
                )
      ),
      );
      function validate_user($data)
      {
         $return = false;
         
         $conditions = array(
             'User.email'=>$data['User']['login_email'],
          );
         //βρες αν υπάρχει ο χρήστης με το συγκεκριμένο username
         $user = $this->find('first', array('conditions'=>$conditions));

         //εάν υπάρχει
         if(!empty($user))
         {
            //έλενξε τον κωδικό
            if($user['User']['password'] == ($data['User']['login_password']))
            {
               $return=$user;
            }
         }
         return $return;
      }

      function findUserByEmail($email)
      {
         $return = false;
         
         $conditions = array(
             'User.email'=>$email,
          );
         //βρες αν υπάρχει ο χρήστης με το συγκεκριμένο username
         $user = $this->find('first', array('conditions'=>$conditions));

         //εάν υπάρχει
         if(!empty($user))
         {
            $return=$user;
         }
         return $return;
      }

      function getUserId($email)
      {
         $return = false;
         
         $conditions = array(
             'User.email'=>$email,
          );
         //βρες αν υπάρχει ο χρήστης με το συγκεκριμένο username
         $user = $this->find('first', array('conditions'=>$conditions));

         //εάν υπάρχει
         if(!empty($user))
         {
            $return=$user['User']['id'];
         }
         return $return;
      }
      
      function beforeValidate()
      {
         //μέσω αυτής της συνάρτησης ελέγχεται εάν χρησιμοποιείται ήδη το email
         //που έδωσε ο χρήστης και τον ενημερώνει αντίστοιχα μέσω του error που 
         //υπάρχει για το συγκεκριμένο πεδίο στο αντίστοιχο view(register.ctp)

        //έλεγχος για το αν ήδη υπάρχει το email που επιλέγει ο χρήστης γίνεται
        //σε 2 περιπτώσεις:
        //α)Κατά την εγγραφή του χρήστη
        //β)Κατά την επεξεργασία προφίλ του χρήστη σε περίπτωση που επεξεργαστεί
        //  το email του.
      //  if((!$this->data['User']['loggedIn'])) //|| (strcmp($this->data['User']['editEmail'], 'yes')==0))
       // {
         $conditions = array(
             'User.email'=>$this->data['User']['email']
          );
         if(!$this->id)
         {
           if($this->find('count', array('conditions'=>$conditions))>0) 
           {
               $this->invalidate('email_unique');
               return false; 
           }
         }
         return true;
        }
   //    else
   //      return true;
   //   }

      function confirmPassword($check)
      {
         $confirm_password = array_shift($check);
         //εάν password και confirm_password είναι ίσα 
         if (strcmp($confirm_password, ($this->data['User']['password']))==0) 
         {
            return true;
         }
         else
         {
            return false; 
         }
      }

      function onlyNumbers($check)
      {
         $phone = array_shift($check);
         //εάν password και confirm_password είναι ίσα 
         if (preg_match("/^[0-9]+$/", $phone)) 
         {
            return true;
         }
         else
         {
            return false; 
         }
      }

      function getActivationHash()
      {
              if (!isset($this->id)) {
                      return false;
              }
              return substr(Security::hash(Configure::read('Security.salt') . $this->field('email') . date('Ymd')), 0, 8);
      }

      
}

?>
