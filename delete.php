<?php
require 'banco.php';

$id = 0;
if(!empty($_GET['codigo']))
{
    $id = $_REQUEST['codigo'];
}
if(!empty($_POST))
{
    $id = $_POST['codigo'];

    //delete do banco
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "delete from tb_alunos where codigo = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    header("Location: index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="span10 offset1">
            <div class="row">
                <h3 class="well">Excluir Contato</h3>
            </div>
            <form class="form-horizontal" action="delete.php" method="POST">
                <input type="hidden" name="codigo" value="<?php echo $id; ?>" />
                <div class="alert alert-danger"> Deseja excluir o contato? </div>
                <div class="form actions">
                    <button type="submit" class="btn btn-danger">Sim</button>
                    <a href="index.php" type="btn" class="btn btn-default">Não</a>
                </div>
            </form>
        </div>
    </div>

    
</body>
</html>