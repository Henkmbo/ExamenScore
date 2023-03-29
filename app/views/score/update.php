<title>Update</title>
<h3><?= $data['title']; ?></h3>
<form method="post" action="<?= URLROOT; ?>score/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Aantalpunten:
                </td>
                <td>
                    <input type="text" name="Aantalpunten" id="score" value="<?= $data['row']->Aantalpunten; ?>"
                        required>

                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data['row']->Id; ?>">
                </td>
                <td>
                    <input type="submit" name="submit" value="Wijzigen">
                </td>
            </tr>

        </tbody>
    </table>
</form>