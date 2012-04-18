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
             
             echo $this->Form->input('depth');
             echo $this->Form->input('re_observation',array("label" => "Have you ever see them again?"));
             
             echo $this->Form->input('email');
             // κλπ κλπ
          ?>
       </fieldset>
<?php echo $this->Form->end('Add Report');?>
