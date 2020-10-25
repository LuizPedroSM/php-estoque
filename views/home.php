<fieldset>
    <form method="get">
        <label for="search">Pesquisa:</label>
        <input type="search" name="search" id="search" placeholder="Digite o código de barras ou o nome do produto"
            value="<?php echo (!empty($_GET['busca']))? $_GET['busca']:'';?>">
    </form>
</fieldset>
<br>
<table width="100%">
    <thead>
        <tr>
            <th>Cód</th>
            <th>Nome</th>
            <th>Preço Unit.</th>
            <th>Qtd</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $item): ?>
        <tr>
            <td><?php echo $item['cod']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>
                <a href="<?php echo BASE_URL;?>home/edit/<?php echo $item['id']; ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
document.getElementById("search").focus();
</script>