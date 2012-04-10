<?php // Γενικά χρησιμοποιούμε το data[Report] για ότι πρόκειται να γραφτεί στην βάση και
      // το data[File] για την εικόνα που θα σωθεί στο δίσκο. Απο κει και πέρα σχεδιάζεις
      // ότι θες                                                                    ?>
<?php echo $this->Form->create('Report'); ?>
       <fieldset>
          <legend>Add New Report</legend>
          <?php
             // Έχω βάλει δοκιμαστικά διάφορα πεδία
             //echo $this->Form->input('File.name',array('type'=>'file'));
             echo $this->Form->input('Report.email');
             echo $this->Form->input('Report.name');
             echo $this->Form->input('Report.surname');
             echo $this->Form->input('Report.phone_number');
             echo $this->Form->input('Report.depth');
             echo $this->Form->input('Report.crowd');
             echo $this->Form->input('Report.date');
          ?>
       </fieldset>
<?php echo $this->Form->end('Add Report');?>
