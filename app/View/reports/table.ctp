<h2>Reports</h2>
       <?php if(empty($reports)): ?>
          There are no tasks in this list
       <?php else: ?>
<table> <tr>
                <th>Created</th>
                <th>Modified</th>
             </tr>
             <?php foreach ($reports as $report): ?>
<tr><td>
         <?php echo $report['Report']['created'] ?>
      </td>
      <td>
         <?php echo $report['Report']['modified'] ?>
</td> <td>
         <!-- actions on tasks will be added later -->
      </td>
   </tr>
<?php endforeach; ?>
       </table>
    <?php endif; ?>
