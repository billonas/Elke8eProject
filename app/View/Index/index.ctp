<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="content-language" content="en-gb" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>ΕΛΚΕΘΕ - Κεντρική σελίδα</title>
		<?php 	echo $this->Html->css(array('main')); 	?>
        <?php 	echo $this->Html->script(array('jquery.min','jquery-ui.min','jquery-1.7.2.min','fade')); 	?>
        
		
		<?php // echo $this->Html->scriptStart(array('inline' => false));?>
        <script>
			$ (document).ready(function($){
	 
			if($('#slideshow').length != 0){
			$('#slideshow').crossSlide({
					sleep: 3,
					fade: 1
			}, [ 
			{ src:  <?php echo "'".$this->Html->Image("wall_01.jpg")."'";?> },
			{ src:  <?php echo "'".$this->Html->Image("wall_02.jpg")."'";?> },
			{ src:  <?php echo "'".$this->Html->Image("wall_03.jpg")."'";?> }
				]);}
			});
		</script>
		<?php //echo $this->Html->scriptEnd();?>
		<!--[if lt IE 10 ]>
			<link rel="stylesheet" href="hacks.css" type="text/css" media="screen" />
		 <![endif]-->
	</head>
	<body>
    	<div class="middle_row">
			<div class="middle_wrapper"></div>
		</div>
		<div class="lower_row">
            <a href="#">
                <h2>Είδη Υψηλής Προτεραιότητας</h2>
                <p>Ενημερωθείτε για τα είδη που έχουν μεγαλύτερη προτεραιότητα αυτή την εποχή για τους αναλυτές μας</p>
            </a>
            <a href="#">
                <h2>Υποβάλλετε Αναφορά</h2>
                <p>Υποβάλλετε μία αναφορά για ένα παράξενο είδος που συναντήσατε</p>
            </a>
            <a href="#">
                <h2>Εγγραφείτε</h2>
                <p>Γίνετε μέλος της κοινότητάς μας και βοηθήστε μας να προστατεύσουμε τις ελληνικές θάλασσες</p>
            </a>
	    </div>
        <div class="comments">
            <div><br />Powered by <a href="http://cakephp.org/">Cake.php</a>, <a href="http://jquery.com/">jQuery</a> and <a href="http://modernizr.com/">Modernizr</a>.</div>
        </div>
	</body>
</html>