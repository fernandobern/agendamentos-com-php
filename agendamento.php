<?php 
    include 'conect.php';
?>
<h1>Formulário de Serviços para Pets</h1>
<form action="salvar_agendamento.php" method="post">
    <div>
        <label for="horario">Horário:</label>
        <input type="time" id="horario" name="horario" required><br><br>

        <label for="entregar_ate">Entregar até:</label>
        <input type="time" id="entregar_ate" name="entregar_ate" required><br><br>

        <label for="tutor">Tutor:</label>
        <input type="text" id="tutor" name="tutor" required><br><br>

        <label for="contato">Contato:</label>
        <input type="text" id="contato" name="contato" required><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="nome_pet">Nome do Pet:</label>
        <input type="text" id="nome_pet" name="nome_pet" required><br><br>

        <label for="raca">Raça:</label>
        <input type="text" id="raca" name="raca" required><br><br>

        <label for="peso">Peso (kg):</label>
        <input type="number" id="peso" name="peso" step="0.1" required><br><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br>

        <label for="pacote">Pacote:</label>
        <select id="banho" name="pacote" required>
            <option value="Avulso">Avulso</option>
            <option value="Mensalista">Mensalista</option>
            <option value="Quinzenal">Quinzenal</option>
        </select><br><br>

        <label for="banho">Tipo de Banho:</label>
        <select id="banho" name="banho" required>
            <option value="Banho Normal">Banho Normal</option>
            <option value="Banho Mágico">Banho Mágico</option>
        </select><br><br>

        <label for="banho1">1° Banho</label>
        <input type="date" id="horario" name="banho1" required><br>
        <label for="banho2">2° Banho</label>
        <input type="date" id="horario" name="banho2" required><br>
        <label for="banho3">3° Banho</label>
        <input type="date" id="horario" name="banho3" required><br>
        <label for="banho4">4° Banho</label>
        <input type="date" id="horario" name="banho4" required><br>
    </div>
    <div style="margin-bottom: 20px;">
        <h2>Check-up</h2>
        <label for="comportado">Comportado?:</label>
        <select id="comportado" name="comportado">
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
            <option value="muito_agitado">Muito agitado</option>
        </select><br><br>

        <label for="pulgas">Pulgas:</label>
        <input type="checkbox" id="pulgas" name="pulgas" value="sim"> Sim<br><br>

        <label for="carrapatos">Carrapatos:</label>
        <input type="checkbox" id="carrapatos" name="carrapatos" value="sim"> Sim<br><br>

        <label for="otite">Otite:</label>
        <input type="checkbox" id="otite_esq" name="otite" value="esq"> Esq
        <input type="checkbox" id="otite_dir" name="otite" value="dir"> Dir<br><br>

        <label for="olhos">Olhos:</label>
        <input type="checkbox" id="olhos_alterado" name="olhos" value="alterado"> Alterado<br><br>

        <label for="feridas_na_pele">Feridas na pele:</label>
        <input type="checkbox" id="feridas_na_pele" name="feridas_na_pele" value="sim"> Sim<br><br>
    </div>
    <div style="margin-bottom: 20px;">
        <label for="valor_total">Valor Total:</label>
        <input type="text" id="valor_total" name="valor_total" required><br><br>

        <h2>Forma de Pagamento</h2>
        <input type="checkbox" id="pagamento_pix" name="pagamento" value="PIX">
        <label for="pagamento_pix">PIX</label><br>

        <input type="checkbox" id="pagamento_cartao" name="pagamento" value="cartao">
        <label for="pagamento_cartao">Cartão</label><br>

        <input type="checkbox" id="pagamento_dinheiro" name="pagamento" value="dinheiro">
        <label for="pagamento_dinheiro">Dinheiro</label><br><br>

        <label for="observacoes">Observações:</label><br>
        <textarea id="observacoes" name="observacoes" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Enviar">
    </div>
</form>
?>
