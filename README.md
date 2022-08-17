# alura-doctrine-orm2
## Descrição do Projeto:
Exercícios do curso de Doctrine conhecendo um ORM PHP da Alura
## Requisitos:
Ter instalado o composer e o PHP (versão 8 ou superior) com com extensão do pdo_sqlite habilitada.
No windows tem de descomentar (remover o ;) a linha "extension=pdo_sqlite" no arquivo php.ini.
## Instalação:
No terminal: 
```
git clone https://github.com/carlosmadsen/alura-doctrine-orm2.git
cd alura-doctrine-orm2
composer install
```
Listando os comandos do doctrine.
```
php .\commands\doctrine.php 
```
Criação do banco de dados sqlite.
```
php .\commands\doctrine.php orm:schema-tool:create
```
Atualização do banco de dados de acordo com as entidades.
```
php .\commands\doctrine.php orm:schema-tool:update
```
Verificação se as entidades foram criadas corretamente.
```
php .\commands\doctrine.php orm:validate-schema
```
Listando as entidades que estão mapeadas.
```
php .\commands\doctrine.php orm:info
```
Apresentando informações de uma entidade, no caso a entidade "Aluno".
```
php .\commands\doctrine.php orm:mapping:describe Aluno 
```
Rodando SQL.
```
php .\commands\doctrine.php dbal:run-sql "select * from Aluno";
```
Rodando DQL.
```
php .\commands\doctrine.php orm:run-dql "select a from Alura\Doctrine\Entity\Aluno a";
```
## Comandos:
Inserindo aluno com telefone.
```
php .\commands\insere-aluno.php "Carlos" "(53) 91844-5566"
```
Listando alunos.
```
php .\commands\lista-alunos.php
```
Adicionando telefone para um aluno.
```
php .\commands\adiciona-telefone.php 1 "(53) 3233-5544"
```
Removendo aluno.
```
php .\commands\remove-aluno.php 1
```