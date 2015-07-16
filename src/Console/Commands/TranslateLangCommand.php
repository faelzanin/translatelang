<?php

namespace Faelzanin\Translatelang\Console\Commands;
use Faelzanin\Translatelang\Classes\TranslateClient;
use Illuminate\Console\Command;

class TranslateLangCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'translate:lang {--filename= : Language file name you want to translate.} {--to= : Location to which you want to translate your file.}';
    protected $signature = 'translate:lang';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translate the language files of your project for any language with a simple command.';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $filename = $this->ask('What is the name of the language file you want to translate?');
            $to = $this->ask('What is the location you want to be translated ? Example : en | es | pt | ru');

            if (($filename) && ($to)) $this->translate($filename, $to);

            $this->info('The language file has been successfully translated');
        } catch(Exception $e){
            $this->error('Error in translating the language file. Try again.');
        }
    }

    private function getWordsForTranslate($filename)
    {
        return \Lang::get($filename);
    }

    public function translate($filename, $to){

        $tc = new TranslateClient();
        $tc->setSource(\App::getLocale());
        $tc->setTarget($to);
        if($this->hasConnection()) {
            if (file_exists(base_path() . '\resources\lang\\' . \App::getLocale() . '\\' . $filename . '.php')) {
                if ($this->isValidLocale($to)) {

                    $array = $this->getWordsForTranslate($filename);
                    $afterTranslate = [];
                    foreach ($array as $key => $word) {
                        $afterTranslate[$key] = $tc->translate($word);
                    }
                    if (!file_exists(base_path() . '\resources\lang\\' . $to)) {
                        mkdir(base_path() . '\resources\lang\\' . $to, 0777, true);
                    }
                    $content = '<?php ' . PHP_EOL . 'return' . PHP_EOL . var_export($afterTranslate, true) . '; ?>';
                    $this->setFileContent($content, $filename, $to);
                } else {
                    throw new \Exception('The location is invalid for option --to');
                }
            } else {
                throw new \Exception('This file name does not exist in the language directory.');
            }
        } else {
            throw new \Exception('Error! Check your internet connection!');
        }
    }

    private function setFileContent($content, $filename, $to){
        try {
            file_put_contents(base_path() . '\resources\lang\\' . $to . '\\' . $filename . '.php', $content);
        } catch(Exception $e){
            throw new \Exception('Error on save the file on the target.');
        }
    }

    private function hasConnection(){
        $connected = @fsockopen("www.google.com", 80);
        return $connected;
    }

    private function isValidLocale($lang)
    {
        return !!preg_match('/^([a-z]{2})(-[A-Z]{2})?$/', $lang);
    }

}
