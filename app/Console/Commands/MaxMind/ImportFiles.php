<?php

namespace App\Console\Commands\MaxMind;

use Illuminate\Console\Command;
use App\MaxMind\Models\MaxmindLocation;
use App\MaxMind\Models\MaxmindIsp;
use DB;


class ImportFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maxmind:import_files 
                            {type_file : \'locations\' | \'isps\' }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Script to import max-mind files';

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
        $this->file_type = $this->argument('type_file');
        
        $this->getFilePath();
        
        $this->batch_total = 1000;
        
        switch($this->file_type){
            
            case 'locations':
                $this->importLocations();
                break;
            case 'isps':
                $this->importIsps();
                break;
            
        }
    }
    
    private function importLocations(){
        
        DB::table('maxmind_locations')->truncate();
        
        if ($handle = fopen($this->file_path,"r")) {
            
            $inserts    = [];
            $count      = 1;
            while (($line = fgetcsv($handle,null,",")) !== false) {
                
                $inserts[] = [
                     'id'               => $line['0'],
                     'country_code'     => utf8_encode($line['1']),
                     'city'             => utf8_encode($line['3']),
                     'created_at'       => \Carbon\Carbon::now()->format("Y/m/d H:i:s")
                ];
                
                
                if(count($inserts)>=1000){
                    $count_inserted = ($count*$this->batch_total);
                    $this->info("Inserted $count_inserted registers");
                    MaxmindLocation::insert($inserts);
                    $inserts = [];
                    $count++;
                }
                
            }
            
            if($inserts){
                MaxmindLocation::insert($inserts);
                $count_inserted = ($count*$this->batch_total);
                $this->info("Inserted $count_inserted registers");
            }
            
            fclose($handle);
        } 
    }
    
    
    private function importIsps(){
        
        DB::table('maxmind_isps')->truncate();
        
        if ($handle = fopen($this->file_path,"r")) {
            
            $inserts = [];
            $count   = 1;
            while (($line = fgetcsv($handle,null,",")) !== false) {
                
                $location = MaxmindLocation::find($line['2']);
                
                if($location){
                    
                    $inserts[] = [
                     'country_code' => $location->country_code,
                     'carrier'      => utf8_encode($line['4']),
                     'isp'          => utf8_encode($line['3']),
                     'created_at'   => \Carbon\Carbon::now()->format("Y/m/d H:i:s")
                    ];
                    
                    if(count($inserts)>=1000){
                        $count_inserted = ($count*$this->batch_total);
                        $this->info("Inserted $count_inserted registers");
                        try 
                        {
                            MaxmindIsp::insertOnDuplicateKey($inserts);
                        }catch(\Illuminate\Database\QueryException $e){
                            $this->error($e->getMessage());
                        }   
                        $inserts = [];
                        $count++;
                    }
                    
                    
                    
                    
                }
                
                
            }
            
            if($inserts){
                $count_inserted = $count*1000;
                $this->info("Inserted $count_inserted registers");
                try 
                {
                    MaxmindIsp::insertOnDuplicateKey($inserts);
                }catch(\Illuminate\Database\QueryException $e){
                    $this->error($e->getMessage());
                } 
            }
            
            fclose($handle);
        } 
    }
    
    private function getFilePath(){
        
        $this->file_path = $this->ask('Please, get me the file path');
        
        if(!file_exists($this->file_path)){
            $this->error('The file \''.$this->file_path.'\' not exist, please, try again');
            $this->getFilePath();
        }
        return(0);
        
    }
}
