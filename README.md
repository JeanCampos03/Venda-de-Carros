# 🚗 Venda-de-Carros
Trabalho de **LPWEB II**

---

## ⚙️ Passo a passo para execução

### 1️⃣ Clonar o repositório
```bash
git clone https://github.com/JeanCampos03/Venda-de-Carros
cd Venda-de-Carros
```

### 2️⃣ Instalar as dependências
```bash
composer install
```
Se aparecer erro dizendo que o Composer não é reconhecido, instale-o em:
https://getcomposer.org/download/


### 3️⃣ Criar o arquivo .env (se não existir)
Renomear arquivo ".env.example"
```bash
mv .env.example .env
```

### 4️⃣ Configurar o banco de dados (dentro do arquivo .env)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=venda_carro
DB_USERNAME=root
DB_PASSWORD=

---

### 5️⃣ Gerar a chave da aplicação 
```bash
php artisan key:generate
```
---

### 6️⃣ Subir as migrations
```bash
php artisan migrate --seed
```
- Cria todas as tabelas;
- Insere o usuário padrão automaticamente

Cria user automaticamente:
email : admin@site.com
password' => 12345678

---

### 7️⃣ Iniciar o servidor local
```bash
php artisan serve
```
---

### Dica extra

Caso ocorra o erro abaixo ao rodar o "composer install"
- Syncing myclabs/deep-copy (1.13.4) into cache Failed to download phpunit/phpunit from dist: The zip extension and unzip/7z commands are both missing, skipping. The php.ini used by your command-line PHP is: C:\xampp\php\php.ini Now trying to download from source

```bash
✅ Solução: Ativar o suporte a ZIP
Opção 1 – Ativar a extensão ZIP do PHP
Abra o arquivo
C:\xampp\php\php.ini
Procure a linha:
;extension=zip
Remova o ponto e vírgula (;) no início, deixando assim:
extension=zip

Salve o arquivo, exclua a pasta vendor e rode novamente "composer install"
```

Autor: Jean Campos
Disciplina: Linguagem de Programação Web II
Projeto: Sistema de Venda de Carros

