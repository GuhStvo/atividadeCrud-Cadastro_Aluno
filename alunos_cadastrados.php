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
            $selectAlunos = $conexao->prepare("SELECT * FROM alunos INNER JOIN escolas INNER JOIN series ON alunos.id_escola=escolas.id_escola AND alunos.id_serie.=serie.id_serie");
            $selectAlunos->execute();
            while($array = $selectAlunos->fetch(PDO::FETCH_ASSOC)){
                $nome_aluno = $array['nome_aluno'];
            }


            ?>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>