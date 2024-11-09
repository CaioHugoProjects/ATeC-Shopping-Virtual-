<?php
// Definir cabeçalhos para permitir que o JavaScript faça solicitações CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Conectar ao banco de dados (exemplo usando PDO)
$host = 'localhost';
$dbname = 'atec_shopping';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Verificar se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Captura os dados do formulário
        $storeName = $_POST['store-name'];
        $ownerName = $_POST['owner-name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $socialMedia = $_POST['social-media'];
        $storeHours = $_POST['store-hours'];

        // Verificar se a imagem foi enviada
        if (isset($_FILES['store-image']) && $_FILES['store-image']['error'] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($_FILES['store-image']['tmp_name']);
            $imageMime = $_FILES['store-image']['type'];
        }

        // Exemplo de query para inserir os dados no banco de dados
        $stmt = $pdo->prepare('INSERT INTO lojas (nome_loja, nome_proprietario, email, senha, telefone, endereco, descricao, categoria, imagem_logo, redes_sociais, horario_funcionamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$storeName, $ownerName, $email, password_hash($password, PASSWORD_DEFAULT), $phone, $address, $description, $category, $imageData, $socialMedia, $storeHours]);

        // Resposta de sucesso
        echo json_encode(['success' => true, 'message' => 'Loja cadastrada com sucesso']);
    } else {
        // Método POST não enviado corretamente
        echo json_encode(['success' => false, 'message' => 'Erro no envio do formulário']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>
