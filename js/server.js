const express = require('express');
const mysql = require('mysql2');
const multer = require('multer');
const path = require('path');
const bodyParser = require('body-parser');

// Configuração do servidor Express
const app = express();
const port = 3306;

// Configuração do banco de dados MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',  // Seu usuário do MySQL
  password: '',  // Sua senha do MySQL
  database: 'atec_shopping'  // Nome do banco de dados
});

// Conectar ao banco de dados
db.connect((err) => {
  if (err) {
    console.error('Erro ao conectar no banco de dados: ' + err.stack);
    return;
  }
  console.log('Conectado ao banco de dados.');
});

// Configuração do Multer para upload de arquivos
const storage = multer.memoryStorage();
const upload = multer({ storage: storage });

// Middleware para parsear o corpo da requisição
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Rota para cadastrar a loja
app.post('/cadastrar-loja', upload.single('store-image'), (req, res) => {
  const {
    storeName,
    ownerName,
    email,
    password,
    phone,
    address,
    description,
    category,
    socialMedia,
    storeHours
  } = req.body;

  // Verificar se a senha e a confirmação da senha são iguais
  if (password !== req.body['confirm-password']) {
    return res.status(400).json({ success: false, message: 'As senhas não correspondem.' });
  }

  // Gerar ID hexadecimal aleatório para a loja
  const storeId = generateHexId();

  // Verificar se a imagem foi enviada
  const storeImage = req.file ? req.file.buffer : null;

  // Inserir dados no banco de dados
  const query = 'INSERT INTO lojas (id, nome_loja, nome_proprietario, email, senha, telefone, endereco, descricao, categoria, imagem_logo, redes_sociais, horario_funcionamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
  db.query(query, [storeId, storeName, ownerName, email, password, phone, address, description, category, storeImage, socialMedia, storeHours], (err, results) => {
    if (err) {
      console.error('Erro ao cadastrar a loja: ' + err.stack);
      return res.status(500).json({ success: false, message: 'Erro no banco de dados.' });
    }

    res.status(200).json({ success: true, message: 'Loja cadastrada com sucesso!' });
  });
});

// Função para gerar ID hexadecimal aleatório
function generateHexId() {
  return 'xxxx-xxxx-xxxx-xxxx'.replace(/[x]/g, () => Math.floor(Math.random() * 16).toString(16));
}

// Iniciar o servidor
app.listen(port, () => {
  console.log(`Servidor rodando na porta ${3306}`);
});
