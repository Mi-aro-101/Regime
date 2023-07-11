<div>
    <table border="1">
        <tr>
            <th>Jour</th>
            <th>Petit Dejeuner</th>
            <th>Dejeuner</th>
            <th>Diner</th>
            <th>Sport</th>
        </tr>
        <?php for ($i=0; $i<count($donnees)-1; $i++) { ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $donnees[$i]['petit_dejeuner']['designation_plat']; ?></td>
                <td><?php echo $donnees[$i]['dejeuner']['designation_plat']; ?></td>
                <td><?php echo $donnees[$i]['diner']['designation_plat']; ?></td>
                <td><?php echo $donnees[$i]['sport']['designation_sport']; ?> (<?php echo $donnees[$i]['sport']['repetition']."x".$donnees[$i]['sport']['serie']; ?>  ) </td>
            </tr>
        <?php } ?>
    </table>
</div>