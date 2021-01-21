<?php
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateDoctorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Dr. ABC', 
            'email' => 'cba@gmail.com',
            'password' => bcrypt('123456'),
            'mobile_no' => '9112128837'
        ]);
    
        $role = Role::create(['name' => 'Doctor']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        $Doctor = Doctor::create([
            'Doctor_user_id' => $user->id, 
            'Doctor_name' => 'Dr. ABC', 
            'Doctor_degree' => "MS",
            'Doctor_specialization' => "Surgery", 
            'Doctor_address' => "Solapur",
            'Doctor_contact_number' => "8329854669",
            'Doctor_maximum_number_of_appointments' => "10" ,
            "Doctor_clinic_time_from" => "07:00:00",
            "Doctor_clinic_time_to" => "11:00:00", 
            "Doctor_holiday" => 1 
        ]); 

        
    }
}
