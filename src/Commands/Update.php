<?php

namespace MahdiAslami\Laravel\Env\Commands;

use Exception;
use Illuminate\Console\Command;
use MahdiAslami\Laravel\Env\Env;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env:update {key} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update an environment variable.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->update();

            return 0;
        } catch (Exception $ex) {
            $this->error($ex->getMessage());

            return 1;
        }
    }

    private function update()
    {
        if (Env::exists()) {
            $key = $this->argument('key');
            $value = $this->argument('value');

            if (!Env::keyExists($key)) {
                throw new Exception("The \"{$key}\" key does not exists.");
            }

            Env::update($key, $value);

            $this->info("The value of \"{$key}\" key updated to \"{$value}\"");
        } else {
            throw new Exception('.env file does not exists.');
        }
    }
}
