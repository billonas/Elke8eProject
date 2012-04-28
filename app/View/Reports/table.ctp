<?php
/**
 * @author darkmatter
 */
?>
<?php echo $this->Html->css(array('main', 'jquery-ui', 'tablesorter', 'reportsTable')); ?>
<?php echo $this->Html->script(array('jquery.min', 'jquery-ui.min', 'jquery.tablesorter.min')); ?>

<script>
    $(document).ready(function() 
    { 
        $("#reportsTable").tablesorter({sortList: [[0,0]]}); //sort the first column in ascending order
    } 
);
    
    function report_onclick(id)
    {
        window.location.href = '/reports/edit/' + id;
    }
</script>
<div class="middle_row">
    <div class="middle_wrapper">
        <div>
            <h2><center>Πίνακας Αναφορών</center></h2>
            
            <?php echo $this->Session->flash(); ?>
            <?php if (empty($reports)): ?>
                There are no reports
            <?php else: ?>

                <?php //Print_r($reports[0]); ?>

                <table id="reportsTable" class="tablesorter reportsTable">
                    <thead>
                        <tr>
                            <th>Ημερομηνία Υποβολής</th>
                            <th>Φωτογραφία Παρατήρησης</th>
                            <th>Κατηγορία</th>
                            <th>Δημοφηλές Eίδος</th>
                            <th>Κατάσταση</th>
                            <th>Τελευταία Επεξεργασία</th>
                            <th>Ενέργειες</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reports as $report): ?>
                            <tr onclick="report_onclick(<?php echo $report['Report']['id'] ?>)">
                                <td>
                                    <?php echo $report['Report']['created'] ?>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $this->Html->image($report['Report']['main_photo'], array('alt' => 'main photo', 'class' => 'tableImage')) ?>
                                    </center>
                                </td>
                                <td>
                                    <?php
                                        if ( isset($report['Category']) )
                                            echo $report['Category']['category_name'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if ( isset($report['HotSpecie']) )
                                            echo $report['HotSpecie']['scientific_name'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $report['Report']['state'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if ( isset($report['Last_edited_by']) )
                                            echo $report['Last_edited_by']['name'];
                                            echo ' ';
                                            echo $report['Last_edited_by']['surname'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link('Edit', array('action'=>'edit',$report['Report']['id'])); 
                                          echo ' ';
                                          echo $this->Html->link('Delete', array('action'=>'delete',$report['Report']['id']));
                                    ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
