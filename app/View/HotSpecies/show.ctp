 <h2>HotSpecies</h2>
    <?php if(empty($hotspecies)): ?>
        There are no hotspecies in this list
    <?php else: ?>
 <table>
 <tr>
 <th>Scientific Name</th>
 <th>Description</th>
 </tr>
    <?php foreach ($hotspecies as $hotspecie): ?>
 <tr>
 <td>
    <?php echo $hotspecie['HotSpecie']['scientific_name'] ?>
 </td>
  <td>
    <?php echo $hotspecie['HotSpecie']['description'] ?>
 </td>
 </tr>
    <?php endforeach; ?>
 </table>
    <?php endif; ?>
