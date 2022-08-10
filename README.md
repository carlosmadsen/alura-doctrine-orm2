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
php .\bin\doctrine.php 
```
Criação do banco de dados sqlite (no windows).
```
php .\bin\doctrine.php orm:schema-tool:create
```
Verificação se as entidades foram criadas corretamente.
```
php .\bin\doctrine.php orm:validate-schema
```
Listando as entidades que estão mapeadas.
```
php .\bin\doctrine.php orm:info
```
Apresentando informações de uma entidade, no caso a entidade "Aluno".
```
php .\bin\doctrine.php orm:mapping:describe Aluno 
```
Rodando SQL.
```
php .\bin\doctrine.php dbal:run-sql "select * from Aluno";
```
Rodando DQL.
```
php .\bin\doctrine.php orm:run-dql "select a from Alura\Doctrine\Entity\Aluno a";
```