<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Αναφορά παρατήρησης</title>
		<?php echo $this->Html->css(array('main','jquery-ui'));	
                      echo $this->Html->css('cake.generic.css'); 
                ?>
        <?php echo $this->Html->script(array('jquery.min','jquery-ui.min')); 	?>

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
                        <li><a href="#fragment-2"><span>2. Βασικές Πληροφορίες <br/>Παρατήρησης</span></a></li>
                        <li><a href="#fragment-3"><span>3. Επιπλέον Πληροφορίες <br/>Παρατήρησης</span></a></li>
                        <li><a href="#fragment-4"><span>4. Στοιχεία <br/>Παρατηρητή</span></a></li>  
                        <li><a href="#fragment-5"><span>5. Στοιχεία <br/>Επικοινωνίας</span></a></li>  
                
                    </ul>
                        <div id="fragment-1">
                            <br/>
                            <?php 
                                echo $this->Form->create('Report', array('action' => 'create', "enctype" => "multipart/form-data"));
                                // ΣΧΕΤΙΚΑ ΜΕ ΤΟ ΕΡΓΑΛΕΙΟ UPLOAD-CROP
                                // http://bakery.cakephp.org/articles/klagoggle_myopenid_com/2010/08/25/jquery-image-upload-crop
                                // Έχω βάλει δοκιμαστικά διάφορα πεδία
                                // Θεωρητικά θα πρέπει να ανεβαίνει μια φωτογραφία μέσω του 'image' και να γίνεται preview
                                // προς στιγμήν ανεβαίνει η εικόνα χωρίς θέμα, οπότε με javascript προσπαθείς να σώσεις στο 'image'
                                // τα στοιχεία όπως σώνονται και πρέπει να βρούμε τρόπο για preview...
                                echo $this->Form->input('image',array("type" => "file",'label'=> 'Φωτογραφία'));
                            ?>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
    
                        </div>
                        <div id="fragment-2">
                           <?php  
                                echo '<br/>';
                                echo $this->Form->input('date',array("label"=>"Ημερομηνία Παρατήρησης"));
                                echo '<br/>';
                                echo $this->Form->input('observation_site',array("label" => "Συντεταγμένες Τοποθεσίας"));
                                echo '<br/>';
                                echo '<br/>';
                                echo $this->Form->end('Κατάθεση αναφοράς'); 
                           ?>
                        </div>
                        <div id="fragment-3">
                            <?php 
                                echo '<br/>';
                                echo $this->Form->input('habitat',array("label"=>"Βιοτοπος-Περιβάλλον Παρατήρησης"));
                                echo '<br/>';
                                echo $this->Form->input('depth',array("label"=>"Βάθος (σε Μέτρα)"));
                                echo '<br/>';
                                echo $this->Form->input('re_observation',array("label" => "Έχετε ξαναδεί το συγκεκριμένο είδος στην περιοχή;"));
                                echo '<br/>';
                                $options = array('-'=>'-','few' => '1-5', 'some' => '6-10','many' => '10-30');  
                                echo $this->Form->input('crowd', array('options' => $options, 'default' => '-','label'=>'Πλήθος Είδους'));
                                echo '<br/>';
                                echo $this->Form->input('comments', array('type' => 'textarea',"label" => "Επιπλέον Σχόλια"));
                                echo '<br/>';
                                echo '<br/>';
                                echo $this->Form->end('Κατάθεση αναφοράς'); 
                                ?>
                        </div>  
                        <div id="fragment-4">
                            <?php  
                                echo '<br/>';
                                echo $this->Form->input('birthdate',array("label" => "Ημερομηνία Γέννησης"));
                                echo '<br/>';
                                $options = array('-'=>'-','first' => 'Πρωτοβάθμια', 'second' => 'Δευτεροβάθμια','uptothird' => 'Τριτοβάθμια - Ανώτατη');  
                                echo $this->Form->input('education', array('options' => $options, 'default' => '-','label'=>'Επίπεδο Εκπαίδευσης'));
                                echo '<br/>';
                                $options = array('-'=>'-','fisherman' => 'Ψαράς', 'ditis' => 'Δύτης','tourist' => 'Τουρίστας','other' => 'Άλλο');  
                                echo $this->Form->input('education', array('options' => $options, 'default' => '-','label'=>'Ιδιότητα'));
                                echo '<br/>';
                                echo '<br/>';
                                echo $this->Form->end('Κατάθεση αναφοράς'); 
                           ?>
                        </div>
                        <div id="fragment-5">
                            <?php  
                                echo '<br/>';
                                echo $this->Form->input('name',array("label" => "Όνομα"));
                                echo '<br/>';
                                echo $this->Form->input('surname',array("label" => "Επώνυμο"));
                                echo '<br/>';
                                echo $this->Form->input('phone',array("label" => "Τηλέφωνο Επικοινωνίας"));
                                echo '<br/>';
                                echo $this->Form->input('email',array("label"=>"E-mail"));
                                echo '<br/>';
                                echo '<br/>';
                                echo $this->Form->end('Κατάθεση αναφοράς'); 
                           ?>
                        </div>
    			</div>
            </div>

	    </div>
        <div class="comments">
            <div><br />Powered by <a href="http://cakephp.org/">Cake.php</a>, <a href="http://jquery.com/">jQuery</a> and <a href="http://modernizr.com/">Modernizr</a>.</div>
        </div>
	</body>
</html>













