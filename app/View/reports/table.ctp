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
</script>
<div class="middle_row">
    <div class="middle_wrapper">
        <div>
            <h2><center>Πίνακας Αναφορών</center></h2>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reports as $report): ?>
                            <tr>
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
