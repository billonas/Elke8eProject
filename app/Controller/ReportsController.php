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
            if(isset($this->data['Report']['image'])){
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
                        $this->Session->setFlash('The Report has been saved');
                        $this->redirect('reports/table');
                    } 
                    else {
                        $this->Session->setFlash('Report not saved. Try again.');
                    }
                }
            }
       }
    }

    
    function edit($id = null) {
//        if($this->Session->check('User')&&(($this->Session->read('User.user_type') == 'analyst')||($this->Session->read('User.user_type') == 'yperanalyst'))){
            if ($id==null) {
                $this->Session->setFlash('Invalid ID');
                $this->redirect('/reports/table');
            }
            if(empty($this->data)) {
                $this->data = $this->Report->findById($id);
                if(empty($this->data)){
                    $this->Session->setFlash('Invalid ID');
                    $this->redirect('/reports/table');
                }
                $report = $this->data;
                $this->set('report',$report);
            } 
            else {
                if ($this->Report->save($this->data)) {
                    $this->Session->setFlash('The Report has been saved');
                    $this->redirect('/reports/table');
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
             $this->Session->setFlash('Invalid id for Task');
             $this->redirect(array('action'=>'table'), null, true);
          }
          if ($this->Report->delete($id)) {
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
