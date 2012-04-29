<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Αναφορά Παρατήρησης</title>
		<?php echo $this->Html->css(array('main','jquery-ui','imgareaselect-default','forms'));	
                ?>
                <?php echo $this->Html->script(array('jquery.min','jquery-ui.min','jquery.imgareaselect.pack.js'));?>
                <?php
                    //echo '<script type="text/javascript" src="'.$this->GoogleMapV3->apiUrl().'"></script>';
                ?>
<script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
</script>


		<!--[if lt IE 10 ]>
			<link rel="stylesheet" href="hacks.css" type="text/css" media="screen" />
		 <![endif]-->
	</head>
	<body>
		<div class="middle_row">
        	<div class="middle_wrapper">   
                <div id="tabs">
                    <ul>
                        <li><a href="#fragment-1">1. Φωτογραφία<br/> παρατήρησης</a></li>
                        <?php  if(isset($cropped)){ 
                  echo '<li><a href="#fragment-2"><span>2. Βασικές Πληροφορίες <br/>Παρατήρησης</span></a></li>
                        <li><a href="#fragment-3"><span>3. Επιπλέον Πληροφορίες <br/>Παρατήρησης</span></a></li>
                        <li><a href="#fragment-4"><span>4. Στοιχεία <br/>Παρατηρητή</span></a></li>  
                        <li><a href="#fragment-5"><span>5. Στοιχεία <br/>Επικοινωνίας</span></a></li> ';
    
                        } ?>
                
                    </ul>
                        <div id="fragment-1">
                            <?php 
                                
                                echo '<br/>';
                                if(!isset($cropped)){
                                    if(!isset($uploaded)){
                                        echo $this->Form->create('Report', array('action' => 'create', "enctype" => "multipart/form-data"));
                                        echo $this->Form->input('image',array("type" => "file",'label'=>'Φωτογραφία'));  
                                        echo $this->Form->input('edit',array("label"=>"Θέλετε να επεξεργαστείτε την φωτογραφία;",'type'=>'checkbox'));
                                        echo $this->Form->end('Ανέβασμα Φωτογραφίας'); 
                                    }
                                    else{
                                        echo $this->Form->create('Report', array('action' => 'create',"enctype" => "multipart/form-data"));     
                                        echo $this->Cropimage->createJavaScript($uploaded['imageWidth'],$uploaded['imageHeight'],151,151);  
                                        echo $this->Cropimage->createForm($uploaded["imagePath"], 151, 151); 
                                        echo $this->Form->submit('Επεξεργασία Φωτογραφίας', array("id"=>"save_thumb"));
                                        echo $this->Form->end();
                                    } 
                                }
                                else{
                                    echo $this->Form->create('Report', array('action' => 'create',"enctype" => "multipart/form-data"));     
                                    echo $this->Html->image($imagePath); 
                                    echo $this->Form->input('main_photo',array('type'=>'hidden','value'=>$imagePath));
                                    echo '<br/>';
                                    echo '<br/>';
                                    echo $this->Form->input('permissionUseMedia',array("label"=>"Mπορούν να χρησιμοποιηθούν οι φωτογραφίες σας;"));
                                    echo '<br/>';
                                }
                            ?>
                        </div>
                        <div id="fragment-2">
                           
                            <br/>
                           <?php  
                           if(isset($cropped)){ 
                                echo $this->Form->input('date',array('label'=>'Ημερομηνία Παρατήρησης'));
                                echo '<br/>';
                                echo $this->Form->input('observation_site',array("label" => "Συντεταγμένες Τοποθεσίας",'placeholder' => 'Συντεταγμένες ή Βάλτε μια κουκίδα Google Maps'));

                           }?>
                        </div>
                        <div id="fragment-3">
                            <?php
                            if(isset($cropped)){ 
                                echo $this->Form->input('image2',array("type" => "file",'label'=>'Επιπλέον Φωτογραφία 1'));
                                echo $this->Form->input('image3',array("type" => "file",'label'=>'Επιπλέον Φωτογραφία 2'));
                                echo $this->Form->input('additional_photo1',array('type'=>'hidden'));
                                echo $this->Form->input('additional_photo2',array('type'=>'hidden'));
                                echo '<br/>';
                                $options = array();
                                $options['1']  = $this->Html->image('hotspecies/1.jpg');
                                $options['2']  = $this->Html->image('hotspecies/2.gif');
                                $options['3']  = $this->Html->image('hotspecies/3.jpg');
                                echo $this->Form->input('hot_id', array('options' => $options,'type'=>'radio','legend'=> false,'before' => 'Είναι κάποιο απ\'τα συγκεκριμένα Hot Species;<br/><br/>'));
                                echo '<br/>';
                                echo $this->Form->input('habitat',array("label"=>"Βιοτοπος-Περιβάλλον Παρατήρησης",'placeholder' => 'Περιγράψτε. Π.Χ. «Βράχια καλυμμένα με βλάστηση»'));
                                echo '<br/>';
                                echo $this->Form->input('depth',array("label"=>"Βάθος",'placeholder' => 'Γράψτε μέτρα(m) ή περιγράψτε'));
                                echo '<br/>';
                                echo $this->Form->input('re_observation',array("label" => "Έχετε ξαναδεί το συγκεκριμένο είδος στην περιοχή;",'placeholder' =>'Αν ναι, περιγράψτε την εμπειρία...'));
                                echo '<br/>';
                                $options = array('-'=>'-','few' => '1-5', 'some' => '6-10','many' => '10-30');  
                                echo $this->Form->input('crowd', array('options' => $options, 'default' => '  -  ','label'=>'Πλήθος Ατόμων Είδους'));
                                echo '<br/>';
                                echo $this->Form->input('comments', array('type' => 'textarea',"label" => "Επιπλέον Σχόλια",'placeholder' =>'Περιγράψτε ότι σας έκανε εντύπωση'));
                                echo '<br/>';
                                echo '<br/>';
                            }?>
                        </div>  
                        <div id="fragment-4">
                            <?php  
                            if(isset($cropped)){ 
                                echo '<br/>';
                                echo $this->Form->input('age',array('label'=>'Ημερομηνία Γέννησης'));
                                echo '<br/>';
                                $options = array('-'=>'-','first' => 'Πρωτοβάθμια', 'second' => 'Δευτεροβάθμια','uptothird' => 'Τριτοβάθμια - Ανώτατη');  
                                echo $this->Form->input('education', array('options' => $options, 'default' => '    -    ','label'=>'Επίπεδο Εκπαίδευσης'));
                                echo '<br/>';
                                $options = array('-'=>'-','fisherman' => 'Ψαράς', 'ditis' => 'Δύτης','tourist' => 'Τουρίστας','other' => 'Άλλο');  
                                echo $this->Form->input('occupation', array('options' => $options, 'default' => '   -   ','label'=>'Ιδιότητα'));
                                echo '<br/>';
                                echo '<br/>';
                            }?>
                        </div>
                        <div id="fragment-5">
                            <?php 
                            if(isset($cropped)){ 
                                echo '<br/>';
                                echo $this->Form->input('name',array("label" => "Όνομα",'placeholder' => 'Κεφαλαία Γράμματα Ελληνικά ή Λατινικά'));
                                echo '<br/>';
                                echo $this->Form->input('surname',array("label" => "Επώνυμο",'placeholder' => 'Κεφαλαία Γράμματα Ελληνικά ή Λατινικά'));
                                echo '<br/>';
                                echo $this->Form->input('phone_number',array("label" => "Τηλέφωνο Επικοινωνίας",'placeholder' => 'Σταθερό ή Κινητό'));
                                echo '<br/>';
                                echo $this->Form->input('email',array("label"=>"E-mail",'placeholder'=>"Παρακαλούμε γράψτε το σε κανονική μορφή. Π.Χ. g.kolokotronis@elkethe.gr"));
                                echo '<br/>';
                                $options = array('unknown' => 'Άγνωστη','confirmed' => 'Έγκυρη', 'unreliable' => 'Αναξιόπιστη');  
                                echo $this->Form->input('state', array('options' => $options,'value'=>'unknown','label'=>'Κατάσταση Αναφοράς','type'=>'hidden'));
                                echo '<br/>';
                                echo $this->Form->end('Κατάθεση Αναφοράς');
                            }?>
                        </div>
    			</div>
            </div>

	    </div>
        <div class="comments">
            <div><br />Powered by <a href="http://cakephp.org/">Cake.php</a>, <a href="http://jquery.com/">jQuery</a> and <a href="http://modernizr.com/">Modernizr</a>.</div>
        </div>
	</body>
</html>













