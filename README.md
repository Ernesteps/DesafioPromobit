-- Cadastro e alteração de Produtos, Tags e Usuário, a consulta dos Produtos e Tags e a adição das TAGS nos produtos.

-- Remoção dos Produtos e Tags.

-- Envolve validação dos mesmos, como por exemplo, não pode ter 2 nomes iguais nos produtos, tags e nome/CPF de Usuário.

-- Ao entrar no sistema, o mesmo depará na tela de cadastro de Usuário, o mesmo deverá cadastrar para assim usufruir internamente o sistema,
    caso altere a URL sem logar, automaticamente retornará para a tela de login.

//Instruções para instalação

Ao baixar o código, favor renomear a pasta DesafioPromobit-main para Promobit

1º - Instalar XAMPP com MySQL

1.1º - Abrir o Control Center do XAMPP e clicar em start o Apache e MySQL

2º - Instalar MySQL Workbench

3º - Ao Executar o MySQL Workbench, criar uma conexão com username root e senha root e verificar se tem conexão com o banco de dados no botão Test Connection

4º - Assim que tudo ocorrer bem, ao entrar no campo Query que automaticamente mostrará na tela, usar os seguintes comandos...

create database db_promobit;

use db_promobit;

4.1º - No lado esquerdo um pouco abaixo, clicar em Schemas e qualquer ligar acima, clicar com botão direito e Refresh All
        para ver se foi inserido corretamente o banco de dados com o nome db_promobit

5º - Copiar a pasta do projeto Promobit dentro do C:\xampp\htdocs\

6º - Executar o der_Promobit

7º - Assim que aparecer o der na tela, na aba Database, clica em Synchronize Model ou CTRL+SHIFT+Z

8º - No Stored Connection, colocar a conexão que criou de início, cujo o username é root e senha root

9º - Clicar em next e depois next também, sem marcar nada.

10º - O mesmo pedirá a senha, então, inserir root e clicar em OK e depois Next

11º - Clicar no mydb e depois na caixinha a esquerda, depois abaixo, selecionar o db_promobit e clicar em Override Target e depois Next.

12º - Inserir a senha e depois next, next, depois execute e clicar em Close.

13º - Fazer o mesmo procedimento no 4.1 e clicar em tables, onde está o db_promobit para ver se o mesmo criou suas respectivas tabelas.

14º - Se tudo ocorreu bem, abrir o navegador e digitar na aba... localhost/Promobit

14.1º - Vai aparecer algumas pastas, clicar em acesso, depois Administrador e depois adm_signin.php.

14.2º - Vai aparecer a tela de entrar no sistema, clicar em registrar agora, fazer o cadastro e depois logar com seu CPF e senha registrado

15º - Pronto, poderá usufruir do sistema... Qualquer dúvida, por gentileza enviar no email ernesto_guilherme@hotmail.com ou mandar mensagem no
        linkedin -- https://www.linkedin.com/in/ernesto-guilherme-schramm-j%C3%BAnior-6ba5bb71/
        Ernesto Guilherme Schramm Júnior.

Todo esse software foi utilizado um Bootstrap já pronto, chamado de AdminBSBMaterialDesign-master, PHP (8.1.1) codificação nativo, sem framework e padrão MVC.

