<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Αναφορά παρατήρησης</title>
		<?php echo $this->Html->css(array('main','jquery-ui'));	?>
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
                        <li><a href="#fragment-5"><span>5. Στοιχεία επικοινωνίας<br/> Παρατηρητή</span></a></li>  
                
                    </ul>
                        <div id="fragment-1">
                            <strong>1. Φωτογραφία παρατήρησης </br>
                            <?php // Γενικά χρησιμοποιούμε το data[Report] για ότι πρόκειται να γραφτεί στην βάση ?>
							<?php echo $this->Form->create('Report', array('action' => 'create', "enctype" => "multipart/form-data")); ?>
                                   <fieldset>
                                      <legend>Add New Report</legend>
                                      <?php
                                         // ΣΧΕΤΙΚΑ ΜΕ ΤΟ ΕΡΓΑΛΕΙΟ UPLOAD-CROP
                                         // http://bakery.cakephp.org/articles/klagoggle_myopenid_com/2010/08/25/jquery-image-upload-crop
                                         // Έχω βάλει δοκιμαστικά διάφορα πεδία
                                         // Θεωρητικά θα πρέπει να ανεβαίνει μια φωτογραφία μέσω του 'image' και να γίνεται preview
                                         // προς στιγμήν ανεβαίνει η εικόνα χωρίς θέμα, οπότε με javascript προσπαθείς να σώσεις στο 'image'
                                         // τα στοιχεία όπως σώνονται και πρέπει να βρούμε τρόπο για preview...
                                         echo $this->Form->input('image',array("type" => "file"));
                                         // Πρέπει να αντιγραφεί αυτόματα το όνομα της εικόνας στο πεδίο main_photo της φόρμας...
                                         //echo $this->Form->hidden('main_photo');
                                         
                                         echo $this->Form->input('date');
                                         echo $this->Form->input('observation_site',array("label" => "Coordinates"));
                                         
                                         echo $this->Form->input('habitat');
                                         echo $this->Form->input('depth');
                                         echo $this->Form->input('re_observation',array("label" => "Have you ever see them again?"));
                                         
                                         //echo $this->Form->input('crowd', array("type" => "select", 'few' => '1-5', 'some' => '6-10','many' => '10-30'));       
                                         echo $this->Form->input('comments', array('type' => 'textarea'));
                                         
                                         echo $this->Form->input('email');
                                         echo $this->Form->input('age',array("maxLength" => "3"));
                                         // κλπ κλπ
                                      ?>
                                   </fieldset>
                            <?php echo $this->Form->end('Add Report');?>
    
                        </div>
                        <div id="fragment-2">
                            2. Βασικές Πληροφορίες Παρατήρησης
                        </div>
                        <div id="fragment-3">
                            3. Επιπλέον Πληροφορίες Παρατήρησης
                        </div>  
                        <div id="fragment-4">
                            4. Στοιχεία Παρατηρητή
                        </div>
                        <div id="fragment-5">
                            5. Στοιχεία επικοινωνίας Παρατηρητή</strong>
                        </div>
    			</div>
            </div>

	    </div>
        <div class="comments">
            <div><br />Powered by <a href="http://cakephp.org/">Cake.php</a>, <a href="http://jquery.com/">jQuery</a> and <a href="http://modernizr.com/">Modernizr</a>.</div>
        </div>
	</body>
</html>













