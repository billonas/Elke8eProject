<?php

/**
 * Report Model
 *
 * @author Chris Mallios,Kiddo
 */
class Report extends AppModel{
    var $name= 'Report';
    
    public $validate = array(
        'main_photo' => array(
            'allowEmpty' => false,
            'message'    => 'Παρακαλώ μεταφορτώστε μια τουλάχιστον εικόνα',
        ),
        'habitat' => array(
                'rule' => 'alphaNumeric',
                'rule' => array('minLength', 4),
                'allowEmpty' => true,
                'message'  => 'Παρακαλώ περιγράψτε τον βιότοπο της παρατήρησης'
        ),
        'email' => array(
            'email' => array(
                'rule'     => 'email',
                'allowEmpty' => true,
                'message'  => 'Το Email δεν έχει κανονική μορφή'
            )
        ),
        'depth' => array(
            'Numeric' => array(
                'rule'  => 'numeric',
                'allowEmpty' => true,
                'message'  => 'Παρακαλώ συμπληρώστε το βάθος σε μέτρα'
            ),
            'between' => array(
                'rule'    => array('between', 0, 4),
                'message' => 'Παρακαλώ δώστε ένα έγκυρο βάθος (< 9999)'
            )
        ),
        'name' => array(
                'rule' => 'alphaNumeric',
                'allowEmpty' => true,
                'message'  => 'Παρακαλώ συμπληρώστε το ονομά σας'
        ),
        'surname' => array(
                'rule' => 'alphaNumeric',
                'allowEmpty' => true,
                'message'  => 'Παρακαλώ συμπληρώστε το επωνυμό σας'
        ),
        'date' => array(
            'rule'       => 'date',
            'message'    => 'Παρακαλώ συμπληρώστε μια κανονική ημερομηνία(Π.Χ. 12/03/2012)',
            'allowEmpty' => false
        )
    );
}

?>
