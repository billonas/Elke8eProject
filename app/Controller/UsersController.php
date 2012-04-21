<?php

/**
 * Description of UsersController
 *
 * @author Billonas
 */
class UsersController extends AppController{
    var $name = 'Users';
    public $helpers = array('Html', 'Form','Session');
	var $layout = 'template';  
	
    //put your code here
    
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
            //$this->redirect(array('action'=>'index','admin'=>true));  
			$this->redirect($this->referer());
         }
         if(!empty($this->data))
         {
            //θέσε στο μοντέλο User τα δεδομένα της φόρμας για να τα κάνει validate
            $this->User->set($this->data);

            //έλενξε εάν τα δεδομένα που δίνει ο χρήστης είναι έγκυρα. Αυτό καθορίζεται
            //με βάση τους κανόνες που έχουν εισαχθεί στο αντίστοιχο μοντέλο(User)
            if($this->User->validates())
            {
               $result = $this->User->validate_user($this->data);
               
               if($result !== FALSE)
               {
                     // update login time  
//                     $this->User->id = $result['User']['id'];  
//                     $this->User->saveField('last_login',date("Y-m-d H:i:s"));  
                     // save to session  

                     $this->Session->write('User',$result);  
                     $this->Session->setFlash('You have successfully logged in','flash_good');  
                     $this->redirect(array('controller'=>'users','action'=>'index'));
					 //$this->redirect($this->referer());
                  
               }
               else 
               {  
                  $this->Session->setFlash('Either your Username of Password is incorrect');  
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
