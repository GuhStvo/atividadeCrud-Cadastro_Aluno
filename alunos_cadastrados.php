<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alunos Cadastrados</title>
</head>

<body>
    <?php
    include_once './header.php';
    include_once "./admin/conexao.php";
    ?>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do aluno</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Série</th>
                    <th scope="col">Série</th>
                </tr>
            </thead>
            <?php 
            $selectAlunos = "SELECT * FROM alunos INNER JOIN escolas INNER JOIN series ON alunos.id_escola=escolas.id_escola AND alunos.id_serie=series.id_serie";
            $preparando = $conexao->prepare($selectAlunos);
            $preparando->execute();
            while($array = $preparando->fetch(PDO::FETCH_ASSOC)){
                $nome_aluno = $array['nome_aluno'];
                $cpf_aluno = $array['cpf_aluno'];
                $matricula = $array['matricula'];
                $nome_responsavel = $array['nome_responsavel'];
                $cpf_responsavel = $array['cpf_responsavel'];
                $contato_responsavel = $array['contato_responsavel'];
                $id_escola = $array['id_escola'];
                $id_serie = $array['id_serie'];
            ?>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </div>

</body>

</html>