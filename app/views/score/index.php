<h3> <?= $data['title'] ?></h3>

<table border='5'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Aantalpunten</th>
        <th>Wijzigen</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>