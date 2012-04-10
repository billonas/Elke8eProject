<?php

/**
 * Description of ReportsController
 *
 * @author Kiddo
 */
class ReportsController extends AppController{
    var $name = 'Reports';
    public $helpers = array('Html', 'Form');
    //put your code here
    
    
    function create() {
        if (!empty($this->data)) {
//            $this->Report->create();
//            $fileOK = $this->uploadFiles('img/files', $this->data['File']);
//            // if file was uploaded ok  
//            if(array_key_exists('urls', $fileOK)) {  
//                // save the url in the form data  
//                $this->data['Report']['main_photo'] = $fileOK['urls'][0];  
                if ($this->Report->save($this->data['Report'])) {
                    $this->Session->setFlash('The Report has been saved ');
                    //$this->redirect(array('action'=>'delete'), null, true);
                } else {
                    $this->Session->setFlash('Report not saved. Try again.');
                }
//            }
//            else{
//                if(array_key_exists('errors', $fileOK)) {  
//                $this->Session->setFlash($fileOK['errors'][0]);
//                }
//            } 
        }
    }
    
    function submit() {
        //put your code here
    }
    
    function edit($id = null) {
         if (!empty($this->data)) {
            if ($this->Report->save($this->data)) {
                    $this->Session->setFlash('The Report has been saved ');
                } else {
                    $this->Session->setFlash('Report not saved. Try again.');
                }
        }
    }
    
    function delete($id = null) {
        if($id!=null){
            $this->set('report',$this->Report->delete($id));
        }
    }
    
    function view($id = null) {
        if($id!=null){
            $this->set('report',$this->Report->read($id));
        }
    }
    
    function table(){
        if (!empty($this->data)) {
            $this->set('reports', $this->Report->find('all'));
        }
        else{
            // Return reports after filtering
        }
    }
}

?>
