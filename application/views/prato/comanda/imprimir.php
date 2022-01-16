<div class="container col-md-10">
    <h3>Prato Cheio</h3>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Informações</h5>
                    Nome do Cliente: <?= $comanda['nome'] ?><br />
                    Data da Comanda: <?= date('d/m/Y H:i:s', strtotime($comanda['data'])) ?><br>

                    <i hidden class="text-white"> <?= date_default_timezone_set('America/Bahia'); ?></i>
                    Status da Comanda: <?= ($comanda['status'] == 0 ? 'Aberto' : 'Finalizado')  ?><br />
                    Data de emissão: <?= date('d/m/Y');  ?><br />
                </td>

                <td>
                    <b class="h5"> #Comanda: <?= $comanda['id'] ?><br></b>
                    <b class="h5"> #Mesa: <?= $comanda['mesa'] ?><br></b>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table  table-bordered mt-4 table-sm ">
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

<script>
    window.print();
</script>