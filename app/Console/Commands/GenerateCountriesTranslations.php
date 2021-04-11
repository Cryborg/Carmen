<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Countries\Package\Countries;

class GenerateCountriesTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:countries_translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate translations files for countries names.';

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
     * @return int
     */
    public function handle()
    {
        $languages = ['en', 'fr'];
        $countries = Countries::all();
        $translationsText = [
            'fr' => '',
            'en' => '',
        ];

        foreach ($countries as $country) {
            foreach ($languages as $language) {
                $name = 'name_' . $language;

                if (isset($country->$name) && $country->$name != '') {
                    $countryName = $country->$name;
                } else {
                    $countryName = 'UNTRANSLATED ' . $country->name->common;
                }

                $countryName = addslashes($countryName);
                $countryName = utf8_decode($countryName);

                if (isset($country))
                $translationsText[$language] .= '\'' . $country->cca3 . '\' => \'' . $countryName . '\',';
            }
        }

        foreach ($languages as $language) {
            Storage::disk('local')
                   ->put(
                       $language . '\countries.php',
                       '<?php return[' . $translationsText[$language] . '];'
                   );
        }

        return 0;
    }
}
