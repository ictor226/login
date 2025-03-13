<style>
*{
    margin: 0;
    padding: 0;
    font-family: "inter", sans-serif;
    list-style: none;
}
body, .estrutura{
    background: url(../LOGIN/img/1554105.jpg) no-repeat center center;
    height: 100vh;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background: url(../LOGIN/img/1554105.jpg) no-repeat center center ;
}
.estrutura h2{
    font-size: 35px;
    margin-bottom: 15px;
}
.estrutura h4{
    margin-bottom: 20px;
}
.estrutura{ /* esta criando o container do formulario, no caso o quadrado que fica no meio da tela*/
    background: rgba(211, 211, 211, 0.74);
    border-radius: 12px;
    text-align: center;
    width: 600px;
    height: 700px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
}
.login-form input{
    width: 300px;
    padding: 5px;
    margin-bottom: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border-color: transparent;
    font-size: 16px;
}
.form-group button[type="submit"] {
    padding: 10px 50px;
    border: none;
    margin-top: 5px;
    text-transform: uppercase;
    border-radius: 10px;
    background-color: #0c9100;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.form-group button[type="submit"]:hover {
    background-color: #0a7400;
}
.form-group {
    margin-bottom: 5px; /* Espaço entre os campos */
}
.editHr{ /*tira a linha de separacao da escrita "ou continue com:" */
    display: flex;
    align-items: center;
    font-size: 18px;
    font-weight: 700;
    margin-top: 1px;
    margin-bottom: 10px;
}
a {
            color: inherit; /* Herda a cor do texto pai */
            text-decoration: none; /* Remove o sublinhado do link */
        }
        a:hover {
            text-decoration: underline; /* Adiciona um sublinhado ao passar o mouse */
        }
        .my-4{
            margin-top: 20px;
            margin-bottom: 20px;           
        }
</style>



<form action="./cad-user.php" method="post">
    <div class="estrutura">
        <div class="login-form">
            <h2 class="titulo-login">Cadastrar-se</h2>
            <div class="form-group">
                <label for="nome"></label>
                <input type="text" id="nome" name="nome" placeholder="Nome e Sobrenome:" title="Escreva o seu Nome" required>
            </div>
            <div class="form-group">
                <label for="ano_nascimento"></label>
                <input type="number" id="ano_nascimento" name="ano_nascimento" placeholder="Ano de Nascimento:" title="Escreva seu Ano de Nascimento" required>
            </div>
            <div class="form-group">
                <label for="cpf"></label>
                <input type="text" id="cpf" name="cpf" placeholder="CPF:" title="Escreva seu CPF" required maxlength="14"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');">
            </div>
            <div class="form-group">
                <label for="telefone_1"></label>
                <input type="tel" name="telefone_1" id="telefone_1" pattern="^\(\d{2}\) \d{9}$" placeholder="Telefone 1:" required
                    title="Escreva seu Telefone" maxlength="14"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{2})(\d{0,9})/, '($1) $2');">
            </div>
            <div class="form-group">
                <label for="telefone_2"></label>
                <input type="tel" name="telefone_2" id="telefone_2" pattern="^\(\d{2}\) \d{9}$" placeholder="Telefone 2:"
                    title="Escreva seu Telefone" maxlength="14"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{2})(\d{0,9})/, '($1) $2');">
            </div>
            <div class="form-group">
                <label for="logradouro"></label>
                <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro:" title="Escreva seu Logradouro" required>
            </div>
            <div class="form-group">
                <label for="n_casa"></label>
                <input type="number" id="n_casa" name="n_casa" placeholder="Número da Casa:" title="Escreva o Número da Casa" required>
            </div>
            <div class="form-group">
                <label for="bairro"></label>
                <input type="text" id="bairro" name="bairro" placeholder="Bairro:" title="Escreva seu Bairro" required>
            </div>
            <div class="form-group">
                <label for="cidade"></label>
                <input type="text" id="cidade" name="cidade" placeholder="Cidade:" title="Escreva sua Cidade" required>
            </div>


            
            <div class="form-group">
                <label for="nome"></label>
                <input type="text" id="nome" name="nome" placeholder="Nome de usuario:" title="Escreva o seu Nome" required>
            </div>

            <div class="form-group">
            <label>senha: </label>
            <input type="password" name="password">
            </div>

            <div class="form-group">
                <button type="submit">cadastrar</button>
            </div>
        </div>
        <hr class="my-4">
        <h4>voltar <a href="./index.php">Clique Aqui.</a></h4>
    </div>
</form>