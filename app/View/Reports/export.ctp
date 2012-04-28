<?php 
   $this->Xls->setHeader('Report_'.date('Y_m_d'));
    $this->Xls->addXmlHeader();
    $this->Xls->setWorkSheetName('Report');
    //1st row for columns name
    $this->Xls->openRow();
    //$this->Xls->writeString('main_photo');
    $this->Xls->writeString('permissionUseMedia');
    $this->Xls->writeString('hotspecies');
    $this->Xls->writeString('depth');
    $this->Xls->writeString('crowd');
    $this->Xls->writeString('re_observation');
    $this->Xls->writeString('date');
    $this->Xls->writeString('observation_site');
    $this->Xls->writeString('habitat');
    $this->Xls->writeString('comments');
    $this->Xls->writeString('age');
    $this->Xls->writeString('education');
    $this->Xls->writeString('occupation');
    $this->Xls->writeString('name');
    $this->Xls->writeString('surname');
    $this->Xls->writeString('phone_number');
    $this->Xls->writeString('email');
    $this->Xls->writeString('category');
    $this->Xls->writeString('scientific_name');
    $this->Xls->writeString('analyst_comments');
    $this->Xls->writeString('state');
    $this->Xls->writeString('voting');
    $this->Xls->writeString('Last edited by');
    $this->Xls->writeString('created');
    $this->Xls->writeString('modified');
    $this->Xls->writeString('exif');
    $this->Xls->closeRow();
    
    //rows for data
    foreach ($reports as $report):
    	$this->Xls->openRow();
	    //$this->Xls->writeString($report['Report']['main_photo']);
	    //$xls->writeString($model['Model']['string_field_3']);
	    //$xls->writeNumber($model['Model']['number_field_4']);
          $this->Xls->writeString($report['Report']['permissionUseMedia']);
	  $this->Xls->writeString($report['HotSpecie']['scientific_name']);
	  $this->Xls->writeString($report['Report']['depth']);
	  $this->Xls->writeString($report['Report']['crowd']);
	  $this->Xls->writeString($report['Report']['re_observation']);
	  $this->Xls->writeString($report['Report']['date']);
	  $this->Xls->writeString($report['Report']['observation_site']);
	  $this->Xls->writeString($report['Report']['habitat']);
	  $this->Xls->writeString($report['Report']['comments']);
	  $this->Xls->writeString($report['Report']['age']);
	  $this->Xls->writeString($report['Report']['education']);
	  $this->Xls->writeString($report['Report']['occupation']);
	  $this->Xls->writeString($report['Report']['name']);
	  $this->Xls->writeString($report['Report']['surname']);
	  $this->Xls->writeString($report['Report']['phone_number']);
	  $this->Xls->writeString($report['Report']['email']);
	  $this->Xls->writeString($report['Category']['category_name']);
	  $this->Xls->writeString($report['Report']['scientific_name']);
	  $this->Xls->writeString($report['Report']['analyst_comments']);
	  $this->Xls->writeString($report['Report']['state']);
	  $this->Xls->writeString($report['Report']['voting']);
	  $this->Xls->writeString($report['Last_edited_by']['name']);
	  $this->Xls->writeString($report['Report']['created']);
	  $this->Xls->writeString($report['Report']['modified']);
	  $this->Xls->writeString($report['Report']['exif']);
	    $this->Xls->closeRow();
    endforeach;
    $this->Xls->addXmlFooter();
    exit();
?>
