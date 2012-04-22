<?php

/**
 * Description of UsersController
 *
 * @author Billonas
 */
class UsersController extends AppController{
    var $name = 'Users';
    public $helpers = array('Html', 'Form','Session');
	
    //put your code here

   //H μέθοδος beforeFilter() εκτελείται πριν από κάθε κλήση ενός action του 
   //συγκεκριμένου controller.
   function beforeFilter() 
   {
      parent::beforeFilter();
   }
    
    function register() {
        //put your code here}
    }
       
    function edit() {
        //put your code here
    }
    
    function update() {
        //put your code here
    }
    
    function delete($id = null) {
        //put your code here
    }
    
    function login() 
    {    //ελέγχει εάν ο χρήστης είναι ήδη συνδεδεμένος. Εάν έιναι ήδη συνδεδεμένος
         //τότε τον κάνει redirect στην αρχική σελίδα
         if( $this->Session->check('User') ) 
         {  
            $this->redirect(array('action'=>'index'));  

         }
         if(!empty($this->data))
         {
            //θέσε στο μοντέλο User τα δεδομένα της φόρμας για να τα κάνει validate
            $this->User->set($this->data);

            echo "debag:ta data paradidontai kanonika";

            //έλενξε εάν τα δεδομένα που δίνει ο χρήστης είναι έγκυρα. Αυτό καθορίζεται
            //με βάση τους κανόνες που έχουν εισαχθεί στο αντίστοιχο μοντέλο(User)
            if($this->User->validates())
            {
               $result = $this->User->validate_user($this->data);
               
               if($result !== FALSE)
               {
                     // update login time  
                     //$this->User->id = $result['User']['id'];  
                     //$this->User->saveField('last_login',date("Y-m-d H:i:s"));  
                     
                     // save to session  
                  echo "user logged in!!!!!";
                  $this->Session->setFlash('You have successfully logged in', 'flash_good');  
                   
                  $this->Session->write('User',$result['User']['email']);  
                  $this->Session->write('UserType', $result['User']['user_type']);
                  $this->redirect(array('controller'=>'users','action'=>'index'));
                  
               }
               else 
               {  
                  $this->Session->setFlash('Either your Username or Password is incorrect', 'flash_bad');  
				      $this->redirect(array('controller'=>'users','action'=>'login'));			  
               }
            }
         }

         
         
      
    }

    function index()
    {
      
    }

    function logout() 
    {  
      if($this->Session->check('User')) 
       {  
           $this->Session->delete('User');  
           $this->Session->setFlash('You have successfully logged out','flash_good');  
       }  
       $this->redirect(array('action'=>'login')); 
    }
    
    function validate($code = null) {
        //put your code here
    }

    
}

?>
