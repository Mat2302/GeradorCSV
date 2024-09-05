# Gerador de CSV a partir de Banco de Dados (PHP)

## Descrição

Este projeto PHP tem como objetivo extrair todos os dados de uma tabela específica em um banco de dados e gerar um arquivo CSV (Comma Separated Values) com essas informações. Ideal para exportação de dados, criação de relatórios e outras aplicações que necessitem de um formato de dados estruturado e fácil de ler. Inicialmente o projeto foi desenvolvido para atividades avaliativas durante o aprendizado no Colégio Técnico de Limeira da Unicamp - COTIL.

## Pré-requisitos

* **PHP:** Verifique a versão mínima requerida pelo seu banco de dados e pelas bibliotecas utilizadas.
* **Extensão PDO:** Necessária para a conexão com o banco de dados.
* **Banco de dados:** Certifique-se de ter um banco de dados configurado e com os dados que deseja exportar.

## Instalação

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/Mat2302/GeradorCSV.git
   ```
2. **Configure as credenciais do banco de dados:**
   Edite o arquivo de configuração ```(connection/connectionBD.php)``` para inserir as informações de conexão com seu banco de dados.
   
3. **Selecione a tabela:**
   Indique no código as tabelas que deseja exportar.

## Personalização
* **Tabela:** Modifique o nome da tabela no arquivo de configuração para exportar dados de uma tabela diferente.
* **Campos:** Altere a consulta SQL para selecionar apenas os campos desejados.

## Contribuições
Contribuições são bem-vindas! Se você encontrar algum problema ou tiver sugestões de melhoria, abra um issue ou faça um pull request.

## Autor
Matheus Vitório Figueiredo de Oliveira - 
mvf200623@gmail.com.
