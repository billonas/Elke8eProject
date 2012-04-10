<?php

/**
 * Description of ReportsController
 *
 * @author Kiddo
 */
class ReportsController extends AppController{
    var $name = 'Reports';
    public $helpers = array('Html', 'Form');
    
    
    function create() {
        if (!empty($this->data)) {
             $this->Report->create();
//            $fileOK = $this->uploadFiles('img/files', $this->data['File']);
//            // if file was uploaded ok  
//            if(array_key_exists('urls', $fileOK)) {  
//                // save the url in the form data  
//                $this->data['Report']['main_photo'] = $fileOK['urls'][0];  
                if ($this->Report->save($this->data['Report'])) {
                    $this->Session->setFlash('The Report has been saved');
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
    
    function edit($id = null) {
//        if($this->Session->check('User')&&(($this->Session->read('User.user_type') == 'analyst')||($this->Session->read('User.user_type') == 'yperanalyst'))){
            if (!empty($this->data)) {
                if ($this->Report->save($this->data)) {
                        $this->Session->setFlash('Report #'.$id.' has been updated ');
                    } else {
                        $this->Session->setFlash('Report #'.$id.' not updated. Try again.');
                    }
            }
            else{
                if($id!=null){
                    $this->set('report', $this->Report->read($id));
                }
                else{
                    $this->Session->setFlash('Invalid ID');
                    $this->redirect(array('action'=>'table'), null, true);
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
            if($id!=null){
                if($this->set('report',$this->Report->delete($id))){
                    $this->Session->setFlash('Report #'.$id.' deleted');
                    $this->redirect(array('action'=>'table'), null, true);
                }
                else{
                    $this->Session->setFlash('Report #'.$id.' not deleteed');
                    $this->redirect(array('action'=>'table'), null, true);
                }
            }
            else{
                $this->Session->setFlash('Invalid ID');
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
            if($id!=null){
                $this->set('report',$this->Report->read($id));
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
                $this->set('reports', $this->Report->find('all'));
            }
//        }
//        else{
//            $this->Session->setFlash('Access denied');
//            $this->redirect('/');
//        }
    }
}

?>
