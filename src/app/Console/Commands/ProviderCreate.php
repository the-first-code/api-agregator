<?php

namespace App\Console\Commands;

use App\Models\ApiProvider;
use Illuminate\Console\Command;

class ProviderCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'provider:create {name?} {description?} {base_url?} {status?} {credentials?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Сохраняет API-провайдера прогноза погоды в БД';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $base_url = $this->argument('base_url');
        $status = $this->argument('status');
        $credentials = $this->argument('credentials');

        if (!$name) {
            $name = $this->ask('Введите имя API-провайдера'); // Если аргумент не задан, спрашиваем
        }
        if (!$description) {
            $description = $this->ask('Введите краткое описание провайдера'); // Если аргумент не задан, спрашиваем
        }
        if (!$base_url) {
            $base_url = $this->ask('Введите uri провайдера прогноза погоды'); // Если аргумент не задан, спрашиваем
        }
        if (!$status) {
            $status = $this->ask('Введите статус провайдера (active, inactive)'); // Если аргумент не задан, спрашиваем
        }
        if (!$credentials) {
            $credentials = $this->ask('Введите учетные данные для доступа к API в формате JSON (ключи, токены и т. п.)'); // Если аргумент не задан, спрашиваем
        }

        ApiProvider::create([
            'name' => $name,
            'description' => $description,
            'base_url' => $base_url,
            'status' => $status,
            'credentials' => $credentials,
        ]);
    }
}
