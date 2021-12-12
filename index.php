<?php 
include('template_header_pub.php');
include('dal.php');
?>

<div class="container" id="Cerca">
    <h2>Cerca una classe</h2>
    <form method="get" action="cerca.php">
        <input name="classe" id="classe" placeholder="Cerca una classe...">
        <button type="submit">Cerca</button>
    </form>
</div>

<div class="container" id="Andamento">
    <h2>Andamento Classi</h2>
</div>

<div class="container" id="Voti">
    <h2>Voti Classi</h2>
    <table>
        <tr>
            <th>Classe</th>
            <th>Media</th>
            <th>Max</th>
            <th>Min</th>
        </tr>
        <?php
        $classi = classi_sel_all();
        foreach ($classi as $c) {
        ?>

        <tr>
            <td>

        <?php
            echo($c['numero'].$c['sezione']);
            }
        ?>
        </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>


    </table>
</div>

<?php include('template_footer.php');?>