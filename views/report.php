<h1>Relatório</h1>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>Cód</th>
            <th>Nome</th>
            <th>Preço Unit.</th>
            <th>Qtd</th>
            <th>Qtd.Min.</th>
            <th>Diferença</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $item): ?>
        <tr>
            <td><?php echo $item['cod']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['min_quantity']; ?></td>
            <td><?php echo (floatval($item['min_quantity']) - floatval($item['quantity'])); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
window.print();
</script>