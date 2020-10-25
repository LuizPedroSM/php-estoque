<h1>Adicionar Produto</h1>
<?php if(!empty($warning)):?>
<div class="warning">
    <?php echo $warning;?>
</div>
<?php endif;?>
<form method="post">
    <label for="cod">Código de Barras:</label><br>
    <input required type="text" name="cod" id="cod"><br>

    <label for="name">Nome do Produto:</label><br>
    <input required type="text" name="name" id="name"><br>

    <label for="price">Preço do Produto:</label><br>
    <input required type="text" name="price" id="price"><br>

    <label for="quantity">Quantidade:</label><br>
    <input required type="text" name="quantity" id="quantity"><br>

    <label for="min_quantity">Qtd. Mínima</label><br>
    <input required type="text" name="min_quantity" id="min_quantity"><br>

    <input type="submit" value="Adicionar">
</form>