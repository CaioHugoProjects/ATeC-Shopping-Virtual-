<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATe.C Shopping - Cadastro/Login de Lojas</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/cabecalhoerodape.css">
    <script>
        function toggleForm(formType) {
            document.getElementById('store-registration-form').style.display = formType === 'register' ? 'block' : 'none';
            document.getElementById('store-login-form').style.display = formType === 'login' ? 'block' : 'none';
        }
    </script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        </script>
        
</head>
<body>
    <header>
        <div class="top-row">
            <div class="logo">
                <img src="img/logo.png" alt="ATe.C logo">
            </div>
            <nav>
                <a href="index.html" class="nav">Home</a>
                <a href="loja.html" class="nav">Loja</a>
                <a href="contato.html" class="nav">Contato</a>
                <a href="cadastro.html" class="nav">Cadastrar-se/Login</a>  
            </nav>
        </div>
        <div class="search-row">
            <form action="">
                <input type="search" placeholder="Pesquisar...">
                <button type="submit">GO.</button>
            </form>
        </div>
    </header>
 
    <main>
        <div class="main-content">
            <!-- Formulário de Cadastro de Loja -->
            <section id="store-registration-form" class="form-section">
                <h2>Cadastro de Loja</h2>
                <form action="js/server.js" method="post" enctype="multipart/form-data">
        <div class="preview">
                <label for="store-image">Imagem da Loja:</label>
                <input type="file" id="store-image" name="store-image" accept="image/*" onchange="previewImage(event)">
            
                <div id="image-preview" class="image-preview">
                    <p>Pré-visualização da imagem</p>
                    <img id="preview" src="" alt="Pré-visualização da imagem" style="display:none;">
                </div>
</div>
                
                    <label for="store-name">Nome da Loja:</label>
                    <input type="text" id="store-name" name="store-name" placeholder="Nome da Loja" required>

                    <label for="owner-name">Nome do Proprietário:</label>
                    <input type="text" id="owner-name" name="owner-name" placeholder="Nome do Proprietário" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email para Contato" required>

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" placeholder="Senha" required>

                    <label for="confirm-password">Confirmar Senha:</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar Senha" required>

                    <label for="phone">Telefone:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Telefone para Contato" required>

                    <label for="address">Endereço:</label>
                    <input type="text" id="address" name="address" placeholder="Endereço da Loja" required>

                    <label for="description">Descrição da Loja:</label>
                    <textarea id="description" name="description" placeholder="Descrição da Loja" rows="5" required></textarea>

                    <label for="category">Categoria:</label>
                    <select id="category" name="category">
                        <option value="electronics">Eletrônicos</option>
                        <option value="clothing">Roupas</option>
                        <option value="home">Casa e Jardim</option>
                        <!-- Adicione mais categorias conforme necessário -->
                    </select>

                    <!-- Imagens da Loja -->
                    <label for="store-images">Imagens da Loja (opcional):</label>
                    <input type="file" id="store-images" name="store-images" accept="image/*" multiple>

                    <!-- Redes Sociais -->
                    <label for="social-media">Redes Sociais da Loja:</label>
                    <input type="url" id="social-media" name="social-media" placeholder="URL das Redes Sociais">

                    <!-- Horário de Funcionamento -->
                    <label for="store-hours">Horário de Funcionamento:</label>
                    <input type="text" id="store-hours" name="store-hours" placeholder="Ex: Seg-Sex 9h às 18h">

                    <!-- Termos de Serviço -->
                    <label>
                        <input type="checkbox" id="terms" name="terms" required>
                        Aceito os <a href="termos.html">Termos de Serviço</a> e a <a href="privacidade.html">Política de Privacidade</a>.
                    </label>

                    <button type="submit">Cadastrar Loja</button>
                </form>
            </section>

            <!-- Formulário de Login de Loja -->
            <section id="store-login-form" class="form-section" style="display: none;">
                <h2>Login de Loja</h2>
                <form id="login-form">
                    <label for="login-email">Email:</label>
                    <input type="email" id="login-email" name="login-email" placeholder="Email" required>

                    <label for="login-password">Senha:</label>
                    <input type="password" id="login-password" name="login-password" placeholder="Senha" required>

                    <button type="submit">Entrar</button>
                </form>
                <script>
                    // Simulação de uma função para verificar login
                    function simulateLogin(email, password) {
                        // Aqui você faria uma chamada real para o backend para verificar o login
                        // Retorna true para login bem-sucedido para demonstração
                        return email === 'loja@exemplo.com' && password === 'senha123'; // Exemplo de validação
                    }
                
                    // Adiciona um event listener ao formulário de login
                    document.getElementById('login-form').addEventListener('submit', function(event) {
                        event.preventDefault(); // Previne o comportamento padrão do formulário
                        
                        // Obtém os valores dos campos
                        var email = document.getElementById('login-email').value;
                        var password = document.getElementById('login-password').value;
                
                        // Verifica o login
                        if (simulateLogin(email, password)) {
                            // Redireciona para a página de perfil da loja (exemplo: profile.html)
                            window.location.href = 'profile.html'; // Substitua com a URL real da página de perfil
                        } else {
                            alert('Email ou senha incorretos!');
                        }
                    });
                </script>
            </section>
        </div>

        <!-- Botões de Alternância no Final da Página -->
        <div class="toggle-buttons">
            <button onclick="toggleForm('register')">Cadastro de Loja</button>
            <button onclick="toggleForm('login')">Login de Loja</button>
        </div>
    </main>
    <script>
        // Função para capturar os dados do formulário de cadastro
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();  // Previne o envio do formulário de forma tradicional
    
            // Captura os dados dos campos do formulário
            const formData = new FormData();
            formData.append('store-image', document.getElementById('store-image').files[0]);  // Imagem da loja
            formData.append('store-name', document.getElementById('store-name').value);
            formData.append('owner-name', document.getElementById('owner-name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('confirm-password', document.getElementById('confirm-password').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('address', document.getElementById('address').value);
            formData.append('description', document.getElementById('description').value);
            formData.append('category', document.getElementById('category').value);
            formData.append('store-images', document.getElementById('store-images').files); // Imagens da loja
            formData.append('social-media', document.getElementById('social-media').value);
            formData.append('store-hours', document.getElementById('store-hours').value);
    
            // Adiciona a validação de senhas no JavaScript
            if (document.getElementById('password').value !== document.getElementById('confirm-password').value) {
                alert('As senhas não correspondem!');
                return;
            }
    
            // Envia os dados para o servidor via POST
            fetch('php/cadastrar_loja.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Lida com a resposta do servidor
                if (data.success) {
                    alert('Loja cadastrada com sucesso!');
                    window.location.href = 'loja.html'; // Redireciona para outra página (por exemplo, página da loja)
                } else {
                    alert('Erro ao cadastrar loja: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Ocorreu um erro ao tentar enviar os dados.');
            });
        });
    </script>
    
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Avaliação</h3>
                <textarea placeholder="Escreva sua avaliação aqui"></textarea>
                <button type="button">Enviar</button>
            </div>
            
            <div class="footer-section">
                <h3>Contato</h3>
                <p>Email: contato@exemplo.com</p>
                <p>Telefone: (00) 1234-5678</p>
            </div>
            
            <div class="footer-section">
                <h3>Redes Sociais</h3>
                <a href="https://www.instagram.com">Instagram</a><br>
                <a href="https://www.facebook.com">Facebook</a><br>
                <a href="https://www.whatsapp.com">Whatsapp</a>
            </div>
            <div class="footer-section">
                <h3>Sustentabilidade</h3>
               <a href="sustentabilidade.html"><img src="img/sustentabilidade.png" alt="Capa Sustentabilidade"></a> 
            </div>
        </div>
        <p class="lastline">ATe.C Shopping Virtual | &copy; Direitos autorais reservados</p>
    </footer>
</body>
</html>