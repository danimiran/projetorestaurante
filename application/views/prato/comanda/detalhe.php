<div class="container">
    <table class="table">
        <tr>
            <td>
                <h5 class="label">Informações</h5>
                Nome do Cliente: <?= $comanda['nome'] ?><br />
                Data da Comanda: <?= date('d/m/Y H:i:s', strtotime($comanda['data'])) ?><br>
                Status: <?= ($comanda['status'] == 0 ? 'Aberto' : 'Finalizado')  ?><br />
            </td>
            <td>
                <p class="h5"> #Comanda: <?= $comanda['id'] ?><br></p>
                <p class="h5"> #Mesa: <?= $comanda['mesa'] ?><br></p>
            </td>
        </tr>
    </table>
    <table class="table table-bordered mt-4 table-sm ">
        <thead class="grey lighten-3">
            <tr class="text-center">
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unit.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody> <?= $item ?> </tbody>
    </table>
</div>