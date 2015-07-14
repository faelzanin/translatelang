
<h1>TranslateLang</h1>

Translate your language files from your project Laravel >= 5.1 with a simple command

<h2>Installation</h2>

TranslateLang must be installed in the default directory of your application by the composer , with the command:

    composer require faelzanin/translatelang

<h2>Configuration</h2>

After installation you must configure the `provider` of TranslateLang , go to the `config/app.php` and add the following line in the array of providers:

    Faelzanin\Translatelang\TranslateLangProvider::class

Done, after doing this, the command to translate your files will be available.

<h2>Use</h2>

> Before running this command, check the existence of a connection to the Internet, because this package uses a Google translator library, to make the translations.

To translate your language files , open the console and run the command:

    php artisan translate:lang

After running this command will show the following question:

    What is the name of the language file you want to translate?

Enter the name of the language file, you want to translate, and press `Enter` to go to the next step:

    What is the location you want to be translated ? Example : en | es | pt | ru

Here, you must report to which location the file is translated. For example, to Portuguese, inform the location pt

If all goes well, it will be shown a success message.

    The language file has been successfully translated.

Also, set the language translated file in the folder below:

    <app>\  
        <resources>\
                <lang>\
                    <location>\
                        Filename.php
 
 Done, simple and practical!
