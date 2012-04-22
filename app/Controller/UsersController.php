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
         if( $this->Session->check('UserUsername') ) 
         {  
            $this->redirect(array('controller'=>'Index', 'action'=>'index'));  

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
                     //$this->User->id = $result['User']['id'];  
                     //$this->User->saveField('last_login',date("Y-m-d H:i:s"));  
                     
                     // save to session  
                  $this->Session->setFlash('You have successfully logged in');  
                      

                  $name = $result['User']['name'];
                  //το πλήρες όνομα του χρήστη υπό την μορφή:V.Kazhs
                  //(αν name=Vasilhs και Surname=Kazhs)
                  $arr = str_split($name);

                  $surname = $result['User']['surname'];

                  $fullname = $arr[0] .".". $surname;

                  $this->Session->write('UserUsername',$result['User']['email']);  
                  $this->Session->write('UserType', $result['User']['user_type']);
                  $this->Session->write('UserFullName',$fullname);  
//                  $this->redirect($this->referer());
                  $url = $this->referer();
//                  $this->Session->setFlash("testring second message");
                  $this->flash('Πατήστε εδώ αν ο browser δεν σας ανακατευθύνει αυτόματα', $url, 4, 'login_success');
               }
               else 
               {  
                  $this->Session->setFlash('Το mail ή ο κωδικός χρήστη που εισάγατε ήταν λάθος!','flash_bad');  
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
      if($this->Session->check('UserUsername')) 
       {  
           $this->Session->delete('UserUsername');  
           $this->Session->delete('UserType');  
           $this->Session->delete('UserFullName');  
           $this->Session->setFlash('You have successfully logged out');  
       }  
       $this->redirect($this->referer()); 
    }
    
    function validate($code = null) 
    {
        //put your code here
    }

    
}

?>
