<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cadastrar aluno</title>
</head>

<body>
    <?php
    include_once './header.php';
    include_once "./admin/conexao.php";
    ?>
    <div class="container">
        <form action="./admin/processar_cadAluno.php" method="post">
            <h1>Cadastro</h1>

            <fieldset>
                <legend>Aluno</legend>
                <div class="form-group">
                    <label for="nome_aluno">Nome do aluno:</label>
                    <input type="text" class="form-control" id="nome_aluno" aria-describedby="emailHelp" placeholder="Coloque o nome do aluno" name="nome_aluno">
                </div>
                <div class="form-group">
                    <label for="nome_aluno">CPF do aluno:</label>
                    <input type="text" class="form-control" id="nome_aluno" aria-describedby="emailHelp" placeholder="000.000.000-00" name="cpf_aluno">
                </div>
                <div class="form-group">
                    <label for="idade_aluno">Idade:</label>
                    <input type="number" class="form-control" id="idade_aluno" aria-describedby="emailHelp" placeholder="Insira a idade do aluno" name="idade_aluno">
                </div>
            </fieldset>
            <fieldset>
                <legend>Responsável</legend>
                <div class="form-group">
                    <label for="nome_responsavel">Nome do responsável:</label>
                    <input type="text" class="form-control" id="nome_responsavel" aria-describedby="emailHelp" placeholder="Insira o nome do responsável" name="nome_responsavel">
                </div>
                <div class="form-group">
                    <label for="cpf_responsavel">CPF do responsável:</label>
                    <input type="text" class="form-control" id="cpf_responsavel" aria-describedby="emailHelp" placeholder="000.000.000-00" name="cpf_responsavel">
                    <div class="form-group">
                        <label for="contato_responsavel">Contato:</label>
                        <div id="contatoHelp" class="form-text">Podendo ser telefone ou celular.</div>
                        <input type="text" class="form-control" id="contato_responsavel" aria-describedby="emailHelp" placeholder="(00) 00000-0000" name="contato_responsavel">
                    </div>
            </fieldset>
            <fieldset>
                <legend>Informações da Escola</legend>
                <div class="form-group">
                    <label for="escola">Escola:</label>
                    <select class="form-select" aria-label="Default select example" name="id_escola" id="escola">
                        <option selected>Escola</option>
                        <?php 
                        $sql = "SELECT * FROM escolas order by nome_escola";
                        $preparando = $conexao->prepare($sql);
                        $preparando->execute();

                        while ($array = $preparando->fetch(PDO::FETCH_ASSOC)) {
                            $id_escola = $array['id_escola'];
                            $nome_escola = $array['nome_escola'];
                        ?>
                        <option value="<?php echo $id_escola; ?>"><?php $nome_escola; ?></option>
                        
                       <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="serie">Série:</label>
                    <select class="form-select" aria-label="Default select example" name="id_serie" id="serie">
                        <option selected>Serie</option>
                        <?php 
                        $sql = "SELECT * FROM series order by nome_serie";
                        $preparando = $conexao->prepare($sql);
                        $preparando->execute();

                        while ($array = $preparando->fetch(PDO::FETCH_ASSOC)) {
                            $id_serie = $array['id_serie'];
                            $nome_serie = $array['nome_serie'];
                        ?>
                        <option value="<?php echo $id_serie ?>">?php $nome_serie; ?></option>
                        <?php }?>
                    </select>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>

</html>
<!-- nome_aluno	matricula	cpf_aluno	nome_responsavel	cpf_responsavel	contato_responsavel	id_escola	id_serie	$resultado = rand(1,60);

$i = 0;
$numero_matricula = [];//Cria um array vazio par armazenar os números
 
    $numero = rand(1, 10000); //gera um número aleatório
    if(array_search($numero, $numero_matricula) === false) { //verifica se o número já existe no array
        $numero_matricula[$numero] = $numero;//se não existir adiciona o número no array
    }

sort($numero_sorteado);//Ordena o array em ordem crescente
echo '<h2>Numeros sorteados: '.implode(" - ", $numero_sorteado).'</h2>'; -->