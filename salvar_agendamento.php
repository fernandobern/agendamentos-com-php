<?php
// Incluir arquivo de conexão com o banco de dados
include 'conect.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Variáveis para armazenar os dados do formulário
    $horario = isset($_POST['horario']) ? $_POST['horario'] : '';
    $entregar_ate = isset($_POST['entregar_ate']) ? $_POST['entregar_ate'] : '';
    $tutor = isset($_POST['tutor']) ? $_POST['tutor'] : '';
    $contato = isset($_POST['contato']) ? $_POST['contato'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $nome_pet = isset($_POST['nome_pet']) ? $_POST['nome_pet'] : '';
    $raca = isset($_POST['raca']) ? $_POST['raca'] : '';
    $peso = isset($_POST['peso']) ? $_POST['peso'] : '';
    $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
    $banho = isset($_POST['banho']) ? $_POST['banho'] : '';
    $banho1 = isset($_POST['banho1']) ? $_POST['banho1'] : '';
    $banho2 = isset($_POST['banho2']) ? $_POST['banho2'] : '';
    $banho3 = isset($_POST['banho3']) ? $_POST['banho3'] : '';
    $banho4 = isset($_POST['banho4']) ? $_POST['banho4'] : '';
    $comportado = isset($_POST['comportado']) ? $_POST['comportado'] : '';
    $pulgas = isset($_POST['pulgas']) ? 'Sim' : 'Não';
    $carrapatos = isset($_POST['carrapatos']) ? 'Sim' : 'Não';
    $otite = isset($_POST['otite']) ? $_POST['otite'] : '';
    $olhos = isset($_POST['olhos']) ? $_POST['olhos'] : '';
    $feridas_na_pele = isset($_POST['feridas_na_pele']) ? 'Sim' : 'Não';
    $valor_total = isset($_POST['valor_total']) ? $_POST['valor_total'] : '';
    $pagamento = isset($_POST['pagamento']) ? $_POST['pagamento'] : '';
    $observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : '';

    // Preparar a consulta SQL para inserir os dados na tabela agendamentos
    $sql = "INSERT INTO clientes (horario, entregar_ate, tutor, contato, endereco, nome_pet, raca, peso, idade, banho, banho1, banho2, banho3, banho4 ,comportado, pulgas, carrapatos, otite, olhos, feridas_na_pele, valor_total, pagamento, observacoes)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        echo "Erro na preparação da consulta: " . $conn->error;
    } else {
        // Bind dos parâmetros e execução da consulta
        $stmt->bind_param("sssssssssssssssssssssss", 
            $horario, 
            $entregar_ate, 
            $tutor, 
            $contato, 
            $endereco, 
            $nome_pet, 
            $raca, 
            $peso, 
            $idade, 
            $banho, 
            $banho1, 
            $banho2, 
            $banho3, 
            $banho4, 
            $comportado, 
            $pulgas, 
            $carrapatos, 
            $otite, 
            $olhos, 
            $feridas_na_pele, 
            $valor_total, 
            $pagamento, 
            $observacoes
        );

        // Executar a consulta
        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }

        // Fechar a declaração
        $stmt->close();
    }

    // Fechar a conexão com o banco de dados
    $conn->close();

} else {
    // Se o formulário não foi submetido corretamente
    echo "Erro: O formulário não foi submetido corretamente.";
}
?>
