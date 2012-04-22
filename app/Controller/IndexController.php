<?php

/**
 * Description of UsersController
 *
 * @author Billonas
 */
class IndexController extends AppController{
  
  
  
	public $helpers = array('Html', 'Session','js');
    function index()
    {
      $this->layout = 'template';  
    }
	public function report() {

	}
    
}

?>
