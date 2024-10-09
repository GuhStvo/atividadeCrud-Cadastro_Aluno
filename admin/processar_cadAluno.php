<?php
include_once "conexao.php"; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_aluno'];
    $cpf = $_POST['cpf_aluno'];
    $idade = $_POST['idade_aluno'];
    $nome_responsavel = $_POST['nome_responsavel'];
    $cpf_responsavel = $_POST['cpf_responsavel'];
    $contato_responsavel = $_POST['contato_responsavel'];
    $escola = $_POST['id_escola'];
    $serie = $_POST['id_serie'];

    
    $numero_matricula = []; //Cria um array vazio par armazenar os números
    $numero = rand(1, 10000); //gera um número aleatório
    if (array_search($numero, $numero_matricula) === false) { 
        $numero_matricula[$numero] = $numero; 
        $matricula = $numero;
    } 

    /* Transformando dados de post para leitura PDO */
    $dados = [
        'nome_aluno' => $nome,
        'cpf_aluno' => $cpf,
        'idade_aluno' => $idade,
        'nome_responsavel' => $nome_responsavel,
        'contato_responsavel' => $contato_responsavel,
        'escola' => $escola,
        'serie' => $serie,
        'matricula' => $matricula
    ];

    $selectMatricula = $conexao->prepare("SELECT * FROM alunos WHERE matricula = :matricula");
    $selectMatricula->bindParam('matricula', $matricula);
    $selectMatricula->execute();
    if ($selectMatricula->rowCount()) {
        $erro .= "Matricula já cadastrada!<br>";
    }
    
    /* Inserindo dados */
    $inserindoDados = $conexao->prepare("INSERT INTO alunos (nome_aluno, matricula, cpf_aluno, nome_responsavel, cpf_responsavel, contato_responsavel, id_escola, id_serie) VALUES (:nome_aluno, :matricula, :cpf_aluno, :nome_responsavel, :cpf_responsavel, :contato_responsavel, :escola, :serie)");
    
    if($inserindoDados->execute($dados)) {
        header('location: index.php?msg=Cadastrado com sucesso!');
    } else {
        header('location: index.php?msg=Não foi possivel cadastrar aluno!');
    }

}
