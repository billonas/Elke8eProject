<?php

/**
 * Description of ReportsController
 *
 * @author Kiddo
 */
class ReportsController extends AppController{
    var $name = 'Reports';
    public $helpers = array('Html', 'Form', 'Cropimage', 'Js','Session');
    public $components = array('JqImgcrop');


   function checkImage($path){
         $result = 1;
         ini_set("display_errors", 0);  //xreiazetai gia na mhn bgainei warning an den einai foto
   	 if(!exif_imagetype($path)){
            $result = 0;
	 }
         ini_set("display_errors", 1);
         return $result;
   }

    function create() {
        if (!empty($this->data)) {
            if(isset($this->data['Report']['image'])){
            	//koitaei an einai ontws fotografia auth pou ebale o xrhsths
            	if(!$this->checkImage($this->data['Report']['image']['tmp_name'])){
  			$this->Session->setFlash('Παρακαλώ εισάγετε μία κανονική φωτογραφία');
                        $this->redirect('create');
                 }
                //briskw thn katalhksh tou arxeiou gia na dwsw thn idia katalhksh sto kainourgio onoma
    	        $tok = strtok (  $this->request->data['Report']['image']['name'], "." );
                while(($tok1 = strtok(".")) !== false){
			        $tok = $tok1;      		
		        }
		    //briskw ena tuxaio arithmo tetoion wste na mhn uparxei eikona ston /img/reports pou na exei gia onoma auton
		      
                        do{ 
    			    $rand = rand();
			        $name = "$rand.$tok";		
		        }while(file_exists("../webroot/img/reports/$name"));
		        //allazw to onoma tou arxeiou kai to kanw ton arithmo pou brhka (me thn katallhlh katalhksh)
		        //(auto den ephreazei tpt, dld den xanetai to arxeio)
                $this->request->data['Report']['image']['name'] = $name;
                $uploaded = $this->JqImgcrop->uploadImage($this->data['Report']['image'], '/img/reports/', ''); 
                $this->set('uploaded',$uploaded); 
                if(!$this->data['Report']['edit']){
                     $cropped = true;
                     $this->set('cropped',$cropped);
                     $this->set('imagePath',$uploaded['imagePath']);
                }
            }
            else{
                if(isset($this->data['Report']['x1'])){
                    $this->JqImgcrop->cropImage($this->data['Report']['w'], $this->data['Report']['x1'], $this->data['Report']['y1'], $this->data['Report']['x2'], $this->data['Report']['y2'], $this->data['Report']['w'], $this->data['Report']['h'], $this->data['Report']['imagePath'], $this->data['Report']['imagePath']);
                    $imagePath = $this->data['Report']['imagePath'];
                    $cropped = true;
                    $this->set('cropped',$cropped);
                    $this->set('imagePath',$imagePath);
                }
                else{
                    $this->Report->create();
                    if ($this->Report->save($this->data['Report'])) {
                        $name = $this->data['Report']['main_photo'];  //pernw to onoma ths eikonas
    		            $newNameId = $this->Report->id;  //to id ths eggrafhs pou molis prostethhke
			            $tok = strtok (  $name, "." ); //briskw thn katalhksh ths eikonas
                	    while(($tok1 = strtok(".")) !== false){
				            $tok = $tok1;      		
			            }
			//dinw sthn eikona gia onoma to id ths eggrafhs(me thn katallhlh katalhksh) kai th metaferw tautoxrona ston fakelo
                        //Model/photos
			            $newName = "../webroot/img/photos/$newNameId.$tok";  
			            rename("../webroot$name", $newName);
			            $this->Report->saveField("main_photo", $newName); //allazw to onoma ths eikonas katallhla
                        $this->Session->setFlash('The Report has been saved');
                        $this->redirect('table');
                    } 
                    else {
                        $this->Session->setFlash('Report not saved. Try again.');
                        $this->redirect(array('controller'=>'Reports', 'action'=>'table'));
                    }
                }
            }
       }
    }

    
    function edit($id = null) {
//        if($this->Session->check('User')&&(($this->Session->read('User.user_type') == 'analyst')||($this->Session->read('User.user_type') == 'yperanalyst'))){
            if ($id==null) {
                $this->Session->setFlash('Invalid ID');
                $this->redirect('table');
            }
            if(empty($this->data)) {
                $this->data = $this->Report->findById($id);
                if(empty($this->data)){
                    $this->Session->setFlash('Invalid ID');
                    $this->redirect('table');
                }
                $report = $this->data;
                $this->set('report',$report);
            } 
            else {
                if ($this->Report->save($this->data)) {
                    $this->Session->setFlash('The Report has been saved');
                    $this->redirect('table');
                } 
                else {
                    $this->Session->setFlash('The Report could not be saved.Please, try again.');
                }    
            }
//        }
//        else{
//            $this->Session->setFlash('Access denied');
//            $this->redirect('/'); 
//        }
    }
    
    function delete($id = null) {
//        if($this->Session->check('User')&&($this->Session->read('User.user_type') == 'yperanalyst')){
          if (!$id) {
             //$this->Session->setFlash('Invalid id for Task');
             $this->redirect(array('controller'=>'Reports', 'action'=>'table'));
          }
          $report = $this->Report->findById($id); //pernw ta stoixeia gia na brw pithana media(eikones)
          if ($this->Report->delete($id)) {
             if($report['Report']['main_photo'])  //diagrafw thn eikona pou antistoixouse sthn eggrafh, ama uparxei
         	    unlink($report['Report']['main_photo']);
             $this->Session->setFlash('Task #'.$id.' deleted');
             $this->redirect(array('action'=>'table'), null, true);
          }
//        }
//        else{
//            $this->Session->setFlash('Access denied');
//            $this->redirect('/');  
//        }
    }
    
    function view($id = null) {
//        if($this->Session->check('User')) {  
            if($id==null){
                $this->Session->setFlash('Invalid ID');
                $this->redirect();
            }
            else{
                $this->set('report',$this->Report->findById($id));
            }
//        }
//        else{
//            $this->Session->setFlash('Access denied');
//            $this->redirect('/');  
//        }
    }
    
    function table(){
//        if($this->Session->check('User')&&(($this->Session->read('User.user_type') == 'analyst')||($this->Session->read('User.user_type') == 'yperanalyst'))){
            if (!empty($this->data)) {
                // Return reports after filtering

            }
            else{
                $this->set('reports', $this->Report->find('all', array('order' => array('created' => 'desc'))));
            }
//        }
//        else{
//            $this->Session->setFlash('Access denied');
//            $this->redirect('/');
//        }
    }
}

?>
