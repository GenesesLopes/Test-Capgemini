# Capgemini - Processo seletivo.

Este projeto foi proposto como etapa de seleção para Desenvolvedor PHP.

# Sobre o projeto!

O projeto consiste em uma aplicação para simples movimentações bancárias (saque, depósito e saldo), e foi divido em duas etapas:

* **Etapa 01.**
    * Criação de uma API utilizando láravel.
* **Etapa 02**
    * Criação de uma SPA simples para manipular os dados da api.

As ações possíveis no projeto são:
* **Cadastrar Clientes**
    * Formulário de cadastro com os dados obrigatórios, e a plataforma gera um número de agência e conta corrente.
* **Verificar Saldo.**
    * Com a entrada de alguns dados bancários, é possível visualizar os seus dados de cadastro, saldo, e as ultimas operações realizadas (saque ou depósito).
* **Realizar depositos.**
    * Com os dados bancários e o valor, é possível realizar depósitos a quaisquer conta cadastrada na base de dados.
* **Realizar Saques.**
    * Com dinheiro na conta e os dados, é possível realizar retidadas de valores.

# Estrutura e tecnologias
Para a construção do projeto, foi utlizado as seguintes tecnologias:

* **Ambiente de desenvolvimento**
    * Docker/docker-compose
        * PHP 7.4
        * Node 12.15
        * Nginx 1.8
* **Font-end.**
    * VueJs
        * Vuex
        * Vue-route
    * Bootstrap 4
        * SASS
    * Axios
* **Back-end.**
    * Lavavel Versão 7
        * Casts
        * Rules
        * Resources API
        * laravel-ui vuejs
    * Sqlite3

# Iniciando projeto

Para iniciar o projeto, não é obrigatório a utilização do docker, porém se faz recomendado por simular ao maximo a ambiente de produção.


- Clone o repositorio:

```bash
  git clone https://github.com/GenesesLopes/Test-Capgemini.git
```

- Navegue até a pasta que acabou de clonar:

```bash
  cd Test-Capgemini
```

- Renomerar os arquivos <code>.env.example</code> e <code>docker-compose.example.yml</code> para <code>.env</code> e <code>docker-compose.yml</code>

- Para subir o container desejado, basta executar o comando (Windows, ou Linux):

```sh
docker-compose up -d nomeDoContainer
```
- Ou pode Subir todos de uma vez: 
```sh
docker-compose up -d 
```
- Containers disponiveis; `app`, `nginx`.
