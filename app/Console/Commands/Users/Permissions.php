<?php

namespace App\Console\Commands\Users;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\User;

class Permissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Script to admin permissions and roles';


    /**
     * The options to the user
     *
     * @var array
     */

    protected $options = [
                            0 => 'Exit',
                            1 => 'Create Role',
                            2 => 'Assign Role to User',

    ];

    /**
     * The option input by the user.
     *
     * @var int
     */
    protected $option;
    protected $option_casted;

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
        $this->start();
    }

    /*Start Main Menu*/
    private function start(){
        $this->askMainOption();
        $this->handleOption();
    }
    
    private function askMainOption(){

        $menu = "";
        foreach($this->options as $key => $option){
                $menu .= "$key) $option\n";
        }

        $this->option           = $this->ask( "What do you want to do?\n$menu");
        $this->option_casted    = (int) $this->option;
        
    }

    private function handleOption(){

        if(!array_key_exists($this->option_casted,$this->options)){
            $this->error("The option '$this->option' is not valid, please, try again");
            $this->start();
        }

        switch($this->option_casted){

            case 0:
                    $this->info("By!");
                    exit;
            break;

            case 1:
                    $this->createRole();
            break;
            case 2:
                    $this->assignRoleToUser();
            break;
            default:
                $this->error("The option '$this->option' is not valid, please, try again");
                $this->start();
            break;
        }
    }
    /*End Main Menu*/

    /*Start Create Role*/
    private function askCreateRole(){
        $role = $this->ask("Please, type the roll to create");
        return($role);
    }

    private function confirmCreateRole($role){
        $confirm = $this->ask("Are you sure yo want create the role '$role' (Yes|No)");

        switch($confirm){
            case 'Yes':
                $role = Role::create(['name' => $role]);
                if($role){
                    $this->info("Success!, the role '$role' have the id $role->id");
                    $this->start();
                }else{
                    $this->error("Ups, something it's wrong, please try again");
                    $role = $this->askCreate();
                    $this->confirmCreateRole($role);
                }
            break;
            case 'No':
                $this->start();
            break;

        }

    }

    private function createRole(){
        $role = $this->askCreateRole();
        $this->confirmCreateRole($role);
    }
    /** End Create Role**/
    
    /** Start Role to User**/

    private function askRoleOption(){
        $roles = Role::all();
        $menu = '';
        $ids = [];
        foreach($roles as $rol){
            $menu .= "$rol->id) $rol->name \n";
            $ids[] = $rol->id;
        }
        $id = $this->ask("Please, select a rol\n".$menu);
        
        if(!in_array($id,$ids)){
            $this->error("the id selected not exist, try again");
            $this->askRoleOption();
        }

        return($id);
    }

    private function askUserOption(){
        $users  = User::all();
        $menu   = "";
        $ids    = [];

        foreach($users as $user){
            $menu .= "$user->id) $user->name \n";
            $ids[] = $user->id;
        }
        $id = $this->ask("Please, select a user\n".$menu);

        if(!in_array($id,$ids)){
            $this->error("the id selected not exist, try again");
            $this->askUserOption();
        }

        return($id);
    }

    private function assignRoleToUser(){
        $id_role = $this->askRoleOption();
        $id_user = $this->askUserOption();

        $role = Role::find($id_role);
        $user = User::find($id_user);

        $this->info("You will assign the Role '$role->name' to the user '$user->name', it's ok?");
        $doAssign = $this->ask("Do you want continue? (Yes|No)");

        switch($doAssign){
            case 'Yes':
                $user->assignRole($role->name);
            break;
            case 'No':
                $this->start();
            break;
            default:
                $this->error("Ups, the response '$doAssign' is not valid");
                $this->assignRoleToUser();
            break;


        }

    }
    /** End Role to User**/
}
