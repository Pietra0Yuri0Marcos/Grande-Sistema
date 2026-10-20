# 🖥 Projeto Integrador - LaMovies 🖥

## 🗒 Visão Geral do Projeto 🗒

### Objetivo

O **LaMovies** é uma aplicação web desenvolvida como parte de um Projeto Integrador, com a finalidade de facilitar a consulta e o gerenciamento de informações sobre filmes.

O sistema utiliza PHP no processamento das requisições, HTML5 na estruturação das páginas e CSS3 na apresentação visual. Para armazenar e manipular os dados, utiliza o PostgreSQL, com acesso ao banco realizado por meio do PDO.

Entre os recursos disponíveis estão o cadastro, a consulta, a edição e a exclusão de filmes, além da pesquisa por título e de um sistema de votação que permite registrar likes e dislikes. A aplicação também possui um módulo de autenticação para cadastro e acesso de usuários.

O projeto foi organizado em diretórios específicos, separando as operações principais, a conexão com o banco de dados, os componentes reutilizáveis, os estilos e os arquivos responsáveis pela autenticação.

### Tecnologias Utilizadas

| Camada | Tecnologia |
| :--- | :--- |
| Back-end | PHP |
| Front-end | HTML5 e CSS3 |
| Banco de dados | PostgreSQL |
| Acesso aos dados | PDO (PHP Data Objects) |
| Driver do banco | PDO_PGSQL |
| Servidor web | Servidor de desenvolvimento do PHP ou ambiente compatível |
| Controle de versão | Git e GitHub |
| Editor de código | Visual Studio Code |

---

## 📁 Estrutura do Projeto 📁

```text
Grande-Sistema/
│
├── app/
│   ├── create.php
│   ├── delete.php
│   ├── select.php
│   ├── select_w.php
│   └── update.php
│
├── database/
│   ├── connect.php
│   └── dump.sql
│
├── includes/
│   ├── footer.php
│   ├── functions.php
│   └── header.php
│
├── login/
│   ├── cadastro.php
│   ├── login.php
│   ├── logout.php
│   └── verifica_user.php
│
├── style/
│   └── style.css
│
├── index.php
└── README.md
```

### Descrição dos Diretórios e Arquivos

- **app/**: reúne os scripts responsáveis pelas operações de cadastro, consulta, atualização e exclusão dos filmes.
- **database/**: contém os arquivos relacionados à conexão com o PostgreSQL e o backup SQL do banco de dados.
- **database/connect.php**: estabelece a conexão entre a aplicação PHP e o banco de dados.
- **database/dump.sql**: armazena uma exportação SQL utilizada para transportar ou restaurar a estrutura e os dados do banco.
- **includes/**: reúne componentes compartilhados entre as páginas, incluindo cabeçalho, rodapé e funções auxiliares.
- **includes/functions.php**: concentra funções utilizadas na execução das operações do sistema.
- **login/**: contém os arquivos responsáveis pelo cadastro de usuários, login, logout e verificação de autenticação.
- **style/**: armazena a folha de estilos CSS responsável pela aparência da aplicação.
- **index.php**: corresponde à página inicial e ao ponto de entrada da aplicação.
- **README.md**: apresenta a documentação técnica e as instruções de utilização do projeto.

---

## ⚙️ Funcionalidades do Sistema ⚙️

O LaMovies permite organizar informações sobre filmes e disponibiliza recursos de consulta e gerenciamento dos registros.

Entre as principais funcionalidades implementadas estão:

- Cadastro de filmes com informações como título, gênero, diretor, ano, duração e nota.
- Listagem dos filmes cadastrados.
- Pesquisa de filmes pelo título.
- Atualização das informações de um filme existente.
- Exclusão de filmes cadastrados.
- Registro de likes e dislikes nos filmes.
- Cadastro de usuários.
- Autenticação por e-mail e senha.
- Controle de acesso por meio de sessões.
- Encerramento da sessão do usuário por meio do logout.

### Operações CRUD

O CRUD corresponde às quatro operações básicas de manipulação de dados: Create (criar), Read (consultar), Update (atualizar) e Delete (excluir).

| Operação | Arquivo PHP | Descrição |
| :--- | :--- | :--- |
| Create | `app/create.php` | Realiza o cadastro de novos filmes, incluindo suas informações principais. |
| Read | `app/select.php` | Consulta e apresenta a lista de filmes cadastrados, com recursos de votação. |
| Read específico | `app/select_w.php` | Permite pesquisar filmes pelo título e consultar informações relacionadas aos votos. |
| Update | `app/update.php` | Atualiza os dados de um filme selecionado por seu identificador. |
| Delete | `app/delete.php` | Exclui o filme selecionado e remove os votos associados a ele. |

### Sistema de Votação

O sistema também possui um recurso de avaliação por meio de likes e dislikes. Os votos são associados aos filmes e utilizados para contabilizar a aceitação dos usuários em relação aos registros apresentados.

A consulta dos filmes permite visualizar informações relacionadas à votação, enquanto as funções da aplicação são responsáveis pelas operações correspondentes.

### Autenticação de Usuários

O módulo de autenticação permite cadastrar usuários e controlar o acesso às funcionalidades que exigem uma sessão autenticada.

| Recurso | Arquivo PHP | Descrição |
| :--- | :--- | :--- |
| Cadastro | `login/cadastro.php` | Registra novos usuários por meio de e-mail e senha. |
| Login | `login/login.php` | Valida as credenciais e inicia a sessão do usuário. |
| Verificação | `login/verifica_user.php` | Verifica a autenticação e redireciona usuários não autenticados para a página de login. |
| Logout | `login/logout.php` | Encerra a sessão do usuário. |

---

## 🗄 Banco de Dados 🗄

O sistema utiliza o **PostgreSQL** como sistema gerenciador de banco de dados, enquanto o PDO é utilizado para realizar a comunicação entre o PHP e o banco.

O arquivo `database/connect.php` contém a configuração responsável por estabelecer essa conexão, e o arquivo `database/dump.sql` disponibiliza uma exportação SQL para auxiliar na restauração do banco.

### Configurações do Banco de Dados

| Configuração | Valor |
| :--- | :--- |
| SGBD | PostgreSQL |
| Nome do banco | `grandesistema` |
| Método de acesso | PDO |
| Driver PHP | PDO_PGSQL |
| Arquivo de conexão | `database/connect.php` |
| Arquivo de backup | `database/dump.sql` |

### Principais Tabelas

O banco de dados contempla os registros relacionados aos filmes, aos usuários e às votações realizadas na aplicação.

| Tabela | Finalidade |
| :--- | :--- |
| `filmes` | Armazena as informações dos filmes cadastrados. |
| `usuarios` | Armazena os dados dos usuários registrados no sistema. |
| `votos` | Registra os votos associados aos filmes e aos usuários. |

---

## 💾 Dump e Backup do Banco de Dados 💾

O dump é uma exportação lógica do banco de dados que pode conter a estrutura das tabelas e os dados armazenados. No LaMovies, o arquivo `database/dump.sql` pode ser utilizado para auxiliar na restauração do banco em outro ambiente.

### Gerando o Backup

Para gerar um novo backup do banco PostgreSQL, execute o comando abaixo na raiz do projeto, ajustando o endereço do servidor conforme o ambiente:

```bash
pg_dump -h localhost -U postgres -d grandesistema -F p -f database/dump.sql
```

Nesse exemplo, o banco está configurado localmente. Caso seja utilizado um servidor remoto, substitua `localhost` pelo endereço correspondente.

**Parâmetros utilizados:**

- `-h`: informa o endereço do servidor PostgreSQL.
- `-U`: define o usuário utilizado para acessar o banco.
- `-d`: especifica o nome do banco de dados.
- `-F p`: define o formato de saída como SQL em texto puro.
- `-f`: indica o caminho e o nome do arquivo de destino.

### Conferindo o Backup

Para verificar se o arquivo existe e consultar seu tamanho no Linux, execute:

```bash
ls -lh database/dump.sql
```

Para localizar instruções de criação de tabelas no arquivo SQL, utilize:

```bash
grep -n "CREATE TABLE" database/dump.sql
```

###  Criar usuario e banco de dados

Acesse o terminal do postgreSQL como administrador:

```sql
sudo -u postgres psql
```

Execute o comandos:

```bash
CREATE USER sistema WITH PASSWORD '1234';
CREATE DATABASE grandesistema OWNER sistema;
```

### Restaurando o Banco de Dados

Com o PostgreSQL instalado e um banco de destino criado, o backup em formato SQL puro pode ser importado utilizando:

```bash
psql -h localhost -U postgres -d grandesistema -f database/dump.sql
```

O banco de destino deve estar preparado para receber os dados. A restauração pode apresentar conflitos se as tabelas já existirem ou se o conteúdo do dump depender de permissões e configurações específicas.

---

## ▶️ Como Executar o Projeto ▶️

### Pré-requisitos

Antes de iniciar a aplicação, verifique se o ambiente possui:

- PHP instalado.
- PostgreSQL instalado e em execução.
- Extensão `pdo_pgsql` habilitada no PHP.
- Git instalado para clonar o repositório.
- Navegador web atualizado.
- Permissões necessárias para acessar o banco de dados.

### Clonando o Repositório

Abra o terminal e execute os comandos:

```bash
git clone https://github.com/Pietra0Yuri0Marcos/Grande-Sistema.git
cd Grande-Sistema
```

### Configurando o Banco de Dados

Antes de executar a aplicação, confira o arquivo `database/connect.php` para identificar os parâmetros de conexão utilizados pelo sistema.

Certifique-se de que o banco `grandesistema` exista e esteja acessível com as credenciais configuradas no ambiente.

Caso seja necessário restaurar os dados iniciais, utilize o arquivo `database/dump.sql`, seguindo os procedimentos de restauração apresentados anteriormente.

### Iniciando o Servidor PHP

Na raiz do projeto, execute:

```bash
php -S localhost:8000
```

Após iniciar o servidor, acesse a aplicação pelo navegador:

http://localhost:8000

O servidor embutido do PHP é apropriado para desenvolvimento e testes locais. Para disponibilizar a aplicação em um ambiente de produção, é necessário utilizar uma configuração adequada de servidor e segurança.

---

## ✔️ Testes e Verificação ✔️

Após iniciar a aplicação, é importante verificar se os principais recursos estão funcionando corretamente.

### Verificações Gerais

- [ ] Confirmar se a página inicial é carregada sem erros.
- [ ] Verificar se os estilos CSS são aplicados corretamente.
- [ ] Testar os links e a navegação entre as páginas.
- [ ] Conferir se os arquivos PHP são executados pelo servidor.

### Verificações do Banco de Dados

Se o sistema utilizar persistência de dados, também será necessário:

- [ ] Testar a conexão com o banco.
- [ ] Verificar se as tabelas necessárias existem.
- [ ] Conferir se as consultas retornam os dados esperados.
- [ ] Testar as operações de inserção, alteração e exclusão, quando disponíveis.

### Verificações de Autenticação

Caso o módulo de login esteja implementado, devem ser testados:

- [ ] O acesso com credenciais válidas.
- [ ] O tratamento de credenciais inválidas.
- [ ] A proteção das páginas restritas.
- [ ] O encerramento correto da sessão.

---

## Repositório - Github 

O código-fonte do projeto está disponível no GitHub:

[Grande-Sistema — Repositório GitHub](https://github.com/Pietra0Yuri0Marcos/Grande-Sistema)
