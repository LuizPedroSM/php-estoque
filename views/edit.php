<h1>Editar Produto</h1>
<?php if(!empty($warning)):?>
<div class="warning">
    <?php echo $warning;?>
</div>
<?php endif;?>
<form method="post">
    <label for="cod">Código de Barras:</label><br>
    <input required type="text" name="cod" id="cod" value="<?php echo $info['cod']?>"><br>

    <label for="name">Nome do Produto:</label><br>
    <input required type="text" name="name" id="name" value="<?php echo $info['name']?>"><br>

    <label for="price">Preço do Produto:</label><br>
    <input required type="text" name="price" id="price"
        value="<?php echo number_format($info['price'], 2, ',', '.')?>"><br>

    <label for="quantity">Quantidade:</label><br>
    <input required type="text" name="quantity" id="quantity"
        value="<?php echo number_format($info['quantity'], 2, ',', '.')?>"><br>

    <label for="min_quantity">Qtd. Mínima</label><br>
    <input required type="text" name="min_quantity" id="min_quantity"
        value="<?php echo number_format($info['min_quantity'], 2, ',', '.')?>"><br>

    <input type="submit" value="Editar">
</form>