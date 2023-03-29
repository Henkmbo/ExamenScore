<?= $data['title']; ?>
<form action="<?= URLROOT; ?>score/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    Aantalpunten:
                </td>
                <td>
                    <input type="text" name="Aantalpunten" value="<?= $data['row']->Aantalpunten; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data['row']->Id; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Wijzigen">
                </td>
            </tr>
        </tbody>
    </table>
</form>