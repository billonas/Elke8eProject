<?php // Γενικά χρησιμοποιούμε το data[Report] για ότι πρόκειται να γραφτεί στην βάση ?>
<?php echo $this->Form->create('Report'); ?>
       <fieldset>
          <legend>Edit Report</legend>
          <?php
             echo $this->Form->hidden('id');
             echo $this->Form->input('date');
             echo $this->Form->input('email');
             echo $this->Form->input('name');
             echo $this->Form->input('surname');
             echo $this->Form->input('depth');
             // κλπ κλπ
          ?>
       </fieldset>
<?php echo $this->Form->end('Edit Report');?>