<?php

/**
 * Description of UsersController
 *
 * @author Billonas
 */
class UsersController extends AppController{
    var $name = 'Users';
    var $components = array('Email');
    public $helpers = array('Html', 'Form','Session');
	
    //put your code here

   //H μέθοδος beforeFilter() εκτελείται πριν από κάθε κλήση ενός action του 
   //συγκεκριμένου controller.
   function beforeFilter() 
   {
      parent::beforeFilter();
      $this->Email->delivery = 'debug'; /* used to debug email message */
   }

    function register() 
    {
      
         //ελέγχει εάν ο χρήστης είναι ήδη συνδεδεμένος. Εάν έιναι ήδη συνδεδεμένος
         //τότε τον κάνει redirect στην αρχική σελίδα
         if($this->Session->check('UserUsername')) 
         {  
            $this->redirect(array('controller'=>'Index', 'action'=>'index'));  
         }
         if(!empty($this->data['User']))
         {
            //θέσε στο μοντέλο User τα δεδομένα της φόρμας για να τα κάνει validate
//            $this->User->set($this->data);

            if($this->User->validates())
            {
               //TODO:
               //1:hash password χρησιμοποιώντας customize συνάρτηση
               //2:sanitize την είσοδο που δίνει ο χρήστης
               $this->User->create(); 
               $this->User->set(array(
                   'name'=> $this->data['User']['name'],
                   'surname'=> $this->data['User']['surname'],
                   'phone_numer'=>$this->data['User']['phone_number'],
                   'email'=>$this->data['User']['email'],
                   'password'=>$this->data['User']['password'],
                   'education'=>$this->data['User']['education'],
                   'occupation'=>$this->data['User']['occupation'],
                   'validation_number'=>'3',
                   'validated'=>'0',
                   'user_type'=>'simple'
                   ));
               if($this->User->save())
               {
                  if($this->__sendActivationEmail($this->User->getLastInsertID())) //παίζει να υπάρχει κάποιο bug εδώ..
                  {
                     $this->Session->setFlash("Message Sent");
                     $this->redirect(array('controller'=>'users', 'action'=>'notifyuser'));
                  }
                  else
                  {
                    $this->Session->setFlash("Message not sent"); 
                    $this->redirect(array('controller'=>'users', 'action'=>'notifyuser'));
                  }
                   // pr($this->Session->read('Message.email')); /*Uncomment this code to view the content of email FOR DEBUG */
                  
               }
               else
               {
                  debug($this->User->validationErrors);
                  $this->Session->setFlash("something went wrong");
               }
               
            }
            else
            {
                  debug($this->User->validationErrors);
                  $this->Session->setFlash("something went very wrong");

            }
         }
         
    }

    function notifyuser()
    {
                                 
    }

    function __sendActivationEmail($user_id)
    {
         $conditions = array(
             'User.id'=>$user_id,
          );
         //βρες αν υπάρχει ο χρήστης με το συγκεκριμένο username
         $user = $this->User->find('first', array('conditions'=>$conditions));
       if ($user === false) 
       {
         debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
         return false;
       }
        $this->set('activate_url', 'http://' . env('SERVER_NAME') . 
                '/users/activate/' . $user['User']['id'] . '/' . $this->User->getActivationHash());
                
        $this->set('username', $this->data['User']['email']);
        echo "to email e;ina " . $user['User']['email'];
        $this->Email->to = $user['User']['email'];
        $this->Email->subject = env('SERVER_NAME') . ' – Please confirm your email address';
        $this->Email->from = 'vas1l1skaz1s@gmail.com';
        $this->Email->template = 'user_confirm';
        $this->Email->sendAs = 'text';   // you probably want to use both :)    

        return $this->Email->send();
    }
    

    
    function edit() 
    {
         //ελέγχει εάν ο χρήστης είναι δεν είναι συνδεδεμένος. Εάν δεν έιναι ήδη συνδεδεμένος
         //τότε τον κάνει redirect στην αρχική σελίδα για να μην μπορεί να δει 
         //την σελίδα επεξεργασίας προφίλ συνδεδεμένου χρήστη.
         if($this->Session->check('UserUsername')) 
         {  
            $this->redirect(array('controller'=>'Index', 'action'=>'index'));  
         }
         
    }
    
    
    function delete($id = null) 
    {
        //put your code here
    }
    
    function login() 
    {    //ελέγχει εάν ο χρήστης είναι ήδη συνδεδεμένος. Εάν έιναι ήδη συνδεδεμένος
         //τότε τον κάνει redirect στην αρχική σελίδα
        // if( $this->Session->check('UserUsername') ) 
        // {  
        //    $this->redirect(array('controller'=>'Index', 'action'=>'index'));  

        // }
         if($this->Session->check('UserUsername'))
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
                     
                      

                  $name = $result['User']['name'];
                  //το πλήρες όνομα του χρήστη υπό την μορφή:V.Kazhs
                  //(αν name=Vasilhs και Surname=Kazhs)
                  $arr = str_split($name);

                  $surname = $result['User']['surname'];

                  $fullname = $arr[0] .".". $surname;

                  $this->Session->write('UserUsername',$result['User']['email']);  
                  $this->Session->write('UserType', $result['User']['user_type']);
                  $this->Session->write('UserFullName',$fullname);  

                  $url = $this->referer();

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
      }  

       $this->redirect($this->referer()); 
    }
    
    function validate($code = null) 
    {
        //put your code here
    }

    
}

?>
