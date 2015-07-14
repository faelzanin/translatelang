
<h1>TranslateLang</h1>

Translate your language files from a Laravel 5.0+ project with a simple command.

<h2>Installation</h2>

TranslateLang must be installed in the root directory of your app, by composer with command:

    composer require faelzanin/translatelang

<h2>Configuration</h2>

 After the conclusion of installation process, you must configure the provider of TranslateLang. Open the file `config/app.php` and add the following line in the array of providers:

    Faelzanin\Translatelang\TranslateLangProvider::class

It's all done! After this steps, the Artisan command to translate your files will be available.

<h2>Usage</h2>

> Before running this command, check the existence of a connection to the Internet, because this package uses a Google translator library, to make the translations.

To translate your language files, open the console and run the command:

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
