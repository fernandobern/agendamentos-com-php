<?php
include 'conect.php';

// Data de referência para a comparação
$dataReferencia = date('Y-m-d'); // Data atual

// Preparar a consulta SQL para selecionar agendamentos onde qualquer banho está dentro de um dia da data de referência
$sqlBanhoDia = "SELECT * FROM clientes WHERE LEAST(banho1, banho2, banho3, banho4) < DATE_ADD(?, INTERVAL 1 DAY)";

$stmt = $conn->prepare($sqlBanhoDia);

// Verificar se a preparação da consulta foi bem-sucedida
if ($stmt === false) {
    echo "Erro na preparação da consulta: " . $conn->error;
} else {
    // Bind do parâmetro e execução da consulta
    $stmt->bind_param("s", $dataReferencia);

    // Executar a consulta
    if ($stmt->execute()) {
        // Obter os resultados
        $result = $stmt->get_result();

        // Verificar se houve algum resultado
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <section>
                        <input type='text' value='" . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') . "' disabled>
                        <input type='text' value='" . htmlspecialchars($row["nome_pet"], ENT_QUOTES, 'UTF-8') . "' disabled>
                        <input type='text' value='" . htmlspecialchars($row["tutor"], ENT_QUOTES, 'UTF-8') . "' disabled>
                        <input type='text' value='" . htmlspecialchars($row["endereco"], ENT_QUOTES, 'UTF-8') . "' disabled>
                        <input type='text' value='" . htmlspecialchars($row["observacoes"], ENT_QUOTES, 'UTF-8') . "' disabled>
                    </section>
                    <h2>Registro de Checks para " . htmlspecialchars($row["nome_pet"], ENT_QUOTES, 'UTF-8') . "</h2>
                    <form action='processar_checkout.php' method='post'>
                        <input type='hidden' name='id_agendamento' value='" . htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8') . "'>
                        <label for='pulgas'>Pulgas:</label>
                        <input type='checkbox' id='pulgas' name='pulgas' value='sim'> Sim
                        <input type='checkbox' id='pulgas_nao' name='pulgas' value='nao'> Não<br><br>

                        <label for='carrapatos'>Carrapatos:</label>
                        <input type='checkbox' id='carrapatos' name='carrapatos' value='sim'> Sim
                        <input type='checkbox' id='carrapatos_nao' name='carrapatos' value='nao'> Não<br><br>

                        <label for='otite'>Otite:</label>
                        <input type='checkbox' id='otite_esq' name='otite[]' value='esq'> Esq
                        <input type='checkbox' id='otite_dir' name='otite[]' value='dir'> Dir<br><br>

                        <label for='olhos'>Olhos:</label>
                        <input type='checkbox' id='olhos_alterado' name='olhos' value='alterado'> Alterado
                        <input type='checkbox' id='olhos_normal' name='olhos' value='normal'> Normal<br><br>

                        <label for='feridas_na_pele'>Feridas na pele:</label>
                        <input type='checkbox' id='feridas_na_pele_sim' name='feridas_na_pele' value='sim'> Sim
                        <input type='checkbox' id='feridas_na_pele_nao' name='feridas_na_pele' value='nao'> Não<br><br>

                        <input type='submit' value='Salvar Checks'>
                    </form>

                ";
            }
        } else {
            echo "Nenhum agendamento encontrado.";
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
    }

    // Fechar a declaração
    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
</div>
