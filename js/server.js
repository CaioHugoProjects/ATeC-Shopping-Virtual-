// server.js
const express = require('express');
const mysql = require('mysql');
const app = express();
const PORT = 3000;

// Configuração da conexão com o banco de dados MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',      // substitua pelo seu usuário do MySQL
  password: '',      // substitua pela sua senha do MySQL
  database: 'nome_do_seu_banco' // substitua pelo nome do seu banco
});

// Conecta ao banco de dados
db.connect((err) => {
  if (err) {
    console.error('Erro ao conectar ao banco de dados:', err);
    return;
  }
  console.log('Conectado ao banco de dados MySQL!');
});

// Rota para pegar dados do banco
app.get('/dados', (req, res) => {
  const query = 'SELECT * FROM sua_tabela'; // substitua por sua tabela
  db.query(query, (err, results) => {
    if (err) {
      res.status(500).send(err);
    } else {
      res.json(results); // Retorna os dados como JSON
    }
  });
});

app.listen(PORT, () => {
  console.log(`Servidor rodando em http://localhost:${PORT}`);
});
