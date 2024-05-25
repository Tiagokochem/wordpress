# 🚀 nScreen WordPress Docker Setup

## 📝 Descrição

Este repositório contém os arquivos necessários para configurar um ambiente Docker rodando o WordPress com um banco de dados MySQL, além de personalizações específicas para o tema do WordPress.

## 🛠 Fase 1: Configuração do Ambiente e Personalização do WordPress

### 🐳 Configuração do Ambiente Docker

O `docker-compose.yml` está configurado para criar um ambiente com o WordPress e um banco de dados MySQL.

### 🎨 Personalização do Tema do WordPress

Na página de adicionar um novo post, no rodapé vai ter um campo chamado "Segundo autor" ao qual precisará preencher, e publicar o post. Assim quando fizer a requisição pelo POSTMAN por exemplo, na url:

http://localhost:8000/?rest_route=/wp/v2/posts/1


Receberá o campo     "segundo_autor": "Segundo Autor Teste" pelo JSON na requisição.


O arquivo `functions.php` foi modificado para adicionar funcionalidades personalizadas ao WordPress, como um campo fictício na página de inserção de posts e um menu personalizado chamado "Teste nScreen".

## 📊 Instruções de Uso

1. Clone o repositório para sua máquina local.
2. Navegue até o diretório clonado.
3. Execute o comando `docker-compose up -d` para iniciar os containers.
4. Acesse `http://localhost:8000` para configurar o WordPress.
5. As personalizações estarão disponíveis no painel de administração do WordPress.

## 🐍 Fase 2: Desenvolvimento de Função Lambda em Python

Os arquivos Python fornecidos são exemplos de funções Lambda que podem ser executadas localmente.

## ▶️ Execução Local da Função Lambda

Para executar a função Lambda localmente:

1. Navegue até o diretório contendo o arquivo `lambda_function.py`.
2. Execute o arquivo com Python usando o comando `python lambda_function.py`.
3. O resultado será exibido no terminal.

## 🤝 Contribuições

Contribuições são bem-vindas! Para contribuir, por favor, faça um fork do repositório, crie uma branch para suas modificações e submeta um pull request.

---

**Nota**: Certifique-se de ter o Docker instalado em sua máquina para seguir estas instruções.

**Até mais!!** 🌟
