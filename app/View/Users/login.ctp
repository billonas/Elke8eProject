<div class="login">  
    <?php echo $this->Form->create('User',array('action'=>'login'));?>  
    <fieldset>  
        <legend>Enter Your Username and Password</legend>  
        <?php  
        echo $this->Form->input('username');  
        echo $this->Form->input('password');  
        ?>  
        <div class="input buttons">  
            <button type="submit" name="data[User][login]" value="login">Login</button>  
        </div>  
    </fieldset>  
<?php echo $this->Form->end();?>  
</div> 
