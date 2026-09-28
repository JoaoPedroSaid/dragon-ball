# 🐉 Dragon Ball — Sistema de Personagens

Sistema web desenvolvido como trabalho em dupla para o curso de **Desenvolvimento de Sistemas**.

O projeto consiste em uma plataforma para consulta e gerenciamento de informações sobre personagens, técnicas, transformações e sagas do universo de **Dragon Ball**, com integração a uma **API de Inteligência Artificial** para gerar conteúdos adicionais sobre os personagens.

---

## 📌 Sobre o projeto

O sistema permite que usuários autenticados naveguem pelo universo de Dragon Ball e consultem informações detalhadas sobre seus personagens.

Além das informações armazenadas no banco de dados, o sistema possui recursos de **Inteligência Artificial**, permitindo gerar dinamicamente:

* 📖 Descrição do personagem
* ⚡ Explicação de sua técnica principal
* 💡 Curiosidades
* 📜 História e trajetória do personagem

A integração com IA utiliza o modelo **GPT-OSS 120B**, disponibilizado através da infraestrutura de inferência da **Hugging Face**.

---

## 🚀 Funcionalidades

### 👤 Personagens

* Listagem de personagens
* Página individual de cada personagem
* Informações sobre:

  * Nome
  * Raça
  * Planeta de origem
  * Técnica principal
  * Transformação
  * Imagem

### ⚡ Técnicas

O sistema possui informações sobre técnicas do universo Dragon Ball, incluindo:

* Nome
* Descrição
* Usuários
* Tipo
* Imagem

### 🤖 Inteligência Artificial

A IA pode ser utilizada diretamente na página de cada personagem para gerar diferentes conteúdos.

As solicitações são enviadas para um **endpoint único**, responsável por identificar a ação solicitada e gerar a resposta correspondente.

As ações disponíveis são:

```text
descricao
tecnica
curiosidade
historia
```

Isso evita a necessidade de criar um arquivo PHP separado para cada função de IA.

### 🔐 Autenticação

O projeto possui sistema de autenticação de usuários, utilizando sessões do PHP para controlar o acesso às páginas protegidas.

### 💾 Banco de dados

As informações do sistema são armazenadas em um banco de dados **MySQL**, contendo tabelas relacionadas a personagens, técnicas, usuários e outros elementos do projeto.

---

## 🛠️ Tecnologias utilizadas

### Front-end

* HTML5
* CSS3
* JavaScript

### Back-end

* PHP
* MySQL
* Apache

### Inteligência Artificial

* Hugging Face Inference API
* OpenAI GPT-OSS 120B

### Ambiente de desenvolvimento

* XAMPP
* MySQL
* Apache

---

## 📂 Estrutura do projeto

```text
dragon-ball/
│
├── ia/
│   ├── config_ia.php
│   ├── gerar_ia.php
│   └── testar_ia.php
│
├── images/
│
├── autenticar.php
├── cadastro_usuario.php
├── conexao.php
├── personagem.php
├── personagens.php
├── sagas.php
├── tecnicas.php
├── transformacoes.php
│
├── salvar_usuario.php
├── dragon_ball.sql
├── style.css
└── README.md
```

### 📁 Pasta `ia/`

Responsável pela integração com a Inteligência Artificial.

O arquivo principal é:

```text
ia/gerar_ia.php
```

Ele recebe a identificação do personagem e a ação solicitada, consulta os dados necessários no banco de dados e realiza a requisição para a API da Hugging Face.

O arquivo:

```text
ia/config_ia.php
```

é utilizado para armazenar as configurações da API, como a chave de autenticação.

> **Importante:** a chave da API não deve ser publicada no GitHub. Recomenda-se utilizar variáveis de ambiente ou um arquivo de configuração que não seja enviado ao repositório.

---

## 🗄️ Banco de dados

O projeto utiliza **MySQL**.

O arquivo:

```text
dragon_ball.sql
```

contém a estrutura e os dados necessários para configurar o banco utilizado pelo sistema.

Entre as informações armazenadas estão:

* Personagens
* Técnicas
* Usuários
* Dados relacionados às funcionalidades do sistema

---

## ⚙️ Como executar o projeto

### 1. Instale o XAMPP

Instale o [XAMPP](https://www.apachefriends.org/) e certifique-se de que os módulos **Apache** e **MySQL** estão disponíveis.

### 2. Clone o repositório

```bash
git clone https://github.com/joaopedrosaid/dragon-ball.git ou https://github.com/kess1ly/dragon-ball.git
```

Depois, coloque o projeto dentro da pasta:

```text
C:\xampp\htdocs\
```

Por exemplo:

```text
C:\xampp\htdocs\dragon-ball
```

### 3. Inicie o XAMPP

No painel do XAMPP, inicie:

```text
Apache
MySQL
```

### 4. Configure o banco de dados

Abra o **phpMyAdmin**:

```text
http://localhost/phpmyadmin
```

Crie um banco de dados para o projeto e importe o arquivo:

```text
dragon_ball.sql
```

### 5. Configure a conexão

Verifique o arquivo:

```text
conexao.php
```

e configure os dados de acesso ao MySQL de acordo com o seu ambiente local.

Exemplo:

```php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "dragon_ball";
```

### 6. Configure a API de IA

Na pasta:

```text
ia/
```

configure o arquivo:

```text
config_ia.php
```

com sua chave da API da Hugging Face.

**Não publique sua chave de API no GitHub.**

### 7. Acesse o sistema

Com Apache e MySQL funcionando, acesse:

```text
http://localhost/dragon-ball/
```

---

## 🤖 Funcionamento da IA

O sistema utiliza um único endpoint para as funcionalidades de Inteligência Artificial:

```text
ia/gerar_ia.php
```

O front-end envia uma requisição contendo:

```text
id
acao
```

Por exemplo:

```text
id = 1
acao = descricao
```

O endpoint então:

1. Verifica se o usuário está autenticado.
2. Valida o personagem solicitado.
3. Busca os dados do personagem no MySQL.
4. Identifica qual função de IA foi solicitada.
5. Monta o prompt correspondente.
6. Envia a solicitação para a API da Hugging Face.
7. Processa a resposta.
8. Retorna o resultado para o JavaScript.
9. Exibe o conteúdo na página sem precisar recarregá-la.

Essa estrutura permite reutilizar o mesmo endpoint para diferentes funcionalidades.

---

## 🔄 Fluxo simplificado

```text
Usuário
   │
   ▼
Página do personagem
   │
   │ solicita uma função
   ▼
JavaScript
   │
   │ POST (id + ação)
   ▼
ia/gerar_ia.php
   │
   ├── Consulta MySQL
   │
   ├── Monta prompt
   │
   ▼
Hugging Face API
   │
   ▼
GPT-OSS 120B
   │
   ▼
Resposta da IA
   │
   ▼
JavaScript
   │
   ▼
Resultado exibido na página
```

---

## 🎯 Objetivos do projeto

O projeto foi desenvolvido com o objetivo de aplicar, de forma prática, conhecimentos relacionados a:

* Desenvolvimento web
* PHP
* HTML e CSS
* JavaScript
* Banco de dados MySQL
* Requisições HTTP
* APIs externas
* Integração com Inteligência Artificial
* Autenticação e sessões
* Organização de projetos web

Além disso, o projeto busca demonstrar como uma aplicação web tradicional pode ser integrada a recursos de Inteligência Artificial para oferecer funcionalidades dinâmicas aos usuários.

---

## 👥 Desenvolvimento

Projeto desenvolvido em dupla como atividade acadêmica do curso de **Desenvolvimento de Sistemas**.

**Integrantes:**

* [Kessily](https://github.com/kess1ly)
* [João Pedro](https://github.com/joaopedrosaid)

---

## 📚 Contexto acadêmico

Este projeto foi desenvolvido com finalidade acadêmica, como forma de aplicar conhecimentos adquiridos durante o curso de **Desenvolvimento de Sistemas**, integrando desenvolvimento web, banco de dados e Inteligência Artificial em uma única aplicação.

---

## ⚠️ Observações

* É necessário possuir uma chave válida da Hugging Face para utilizar as funcionalidades de IA.
* A chave da API deve ser mantida em ambiente privado.
* O projeto foi desenvolvido para execução local utilizando XAMPP.
* As respostas geradas pela IA dependem do modelo utilizado e podem apresentar variações entre solicitações.

---

## 📄 Licença

Este projeto foi desenvolvido para fins **educacionais e acadêmicos**.

O conteúdo relacionado à franquia **Dragon Ball** pertence aos seus respectivos detentores de direitos.
