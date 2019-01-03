<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ImportController;
use App\ProductImport;
use App\Mail\SendMailUser;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mystore:importproducts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'will import files from the "storage / import / product" folder every 5 minutes';

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
        $archives = ProductImport::where('imported','=','0')
            ->get();

        $import = new ImportController;

        if (!empty($archives)) {
            foreach ($archives as $archive) {
                $path = storage_path('app/import/product/' . $archive->name);

                $res = $import->productCsv($path);

                $mailUser = New SendMailUser();

                $mailUser->setLines($res);

                Mail::to()->send($mailUser);
            }
        }
    }
}
