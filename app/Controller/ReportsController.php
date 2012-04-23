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




    function create() {
        if (!empty($this->data)) {
            $this->Report->create();
            if ($this->Report->save($this->data['Report'])) {
                // Allagi onomatos eikonas
                //$this->data['Report']['image'] = oti graftike stin vasi
                $this->JqImgcrop->uploadImage($this->data['Report']['image'], '/img/reports/','');
                //crop an xreiazetai
                //$this->JqImgcrop->cropImage(151, $this->data['Report']['x1'], $this->data['Report']['y1'], $this->data['Report']['x2'], $this->data['Report']['y2'], $this->data['Report']['w'], $this->data['Report']['h'], $this->data['Report']['imagePath'], $this->data['Report']['imagePath']);
                //$this->set('uploaded',$uploaded)
                $this->Session->setFlash('The Report has been saved');
                $this->redirect(array('controller' => 'reports','action'=>'create'), null, true);
            } 
            else {
                $this->Session->setFlash('Report not saved. Try again.');
            }
        }
    }
    
    function edit($id = null) {
//        if($this->Session->check('User')&&(($this->Session->read('User.user_type') == 'analyst')||($this->Session->read('User.user_type') == 'yperanalyst'))){
            if ($id==null) {
                $this->Session->setFlash('Invalid ID');
                $this->redirect(array('action'=>'table'), null, true);
            }
            if(empty($this->data)) {
                $this->data = $this->Report->findById($id);
                if(empty($this->data)){
                    $this->Session->setFlash('Invalid ID');
                    $this->redirect(array('action'=>'table'), null, true);
                }
            } 
            else {
                if ($this->Report->save($this->data)) {
                    $this->Session->setFlash('The Report has been saved');
                    $this->redirect(array('action'=>'table'), null, true);
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
            if($id!=null){
                $this->Session->setFlash('Invalid ID');
                $this->redirect(array('action'=>'table'), null, true);
            }
            else{
                // Διαγραφή εικόνων
                if($this->set('report',$this->Report->delete($id))){
                    $this->Session->setFlash('Report #'.$id.' deleted');
                    $this->redirect(array('action'=>'table'), null, true);
                }
                else{
                    $this->Session->setFlash('Report #'.$id.' not deleteed');
                    $this->redirect(array('action'=>'table'), null, true);
                }
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
