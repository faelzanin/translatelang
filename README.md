
<h1>TranslateLang</h1>

Traduza seus arquivos de linguagem de seu projeto Laravel >=5.1 com apenas um comando!

<h2>Instalação</h2>

Translatelang deve ser instalado dentro do diretório padrão de sua aplicação através do composer, com o comando:

    composer require faelzanin/translatelang

<h2>Configuração</h2>

Após a instalação você deve configurar o  provider do TranslateLang, vá até o arquivo config/app.php e adicione a linha abaixo no array de providers:

    Faelzanin\Translatelang\TranslateLangProvider::class

Pronto, após realizar este procedimento o comando para traduzir seus arquivos estará disponível.

<h2>Utilização</h2>

Ps: Antes de executar este comando, verifique se existe uma conexão com a internet, pois este pacote, utiliza a biblioteca do Google Tradutor, para realizar as traduções.

Para traduzir seus arquivos de linguagem, abra o console e execute o comando:

    php artisan translate:lang

Após executar este comando irá aparecer a seguinte pergunta:

    What is the name of the language file you want to translate?

Informe o nome do arquivo de linguagem que deseja traduzir, e aperte Enter para ir para o próximo passo:

    What is the location you want to be translated ? Example : en | es | pt | ru

Aqui, você deve informar pra qual localização será traduzida o arquivo. Por exemplo, para português, deve informar pt .

Se tudo ocorrer bem, será mostrado uma mensagem de sucesso.

    The language file has been successfully translated.

E também, criado o arquivo de linguagem traduzido dentro da pasta resources/lang.
