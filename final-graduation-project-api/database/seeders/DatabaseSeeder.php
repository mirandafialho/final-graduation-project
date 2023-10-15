<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Report;
use App\Models\ServiceCatalogue;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         $user = User::factory([
             'name'     => 'Admin TFG',
             'email'    => 'admin@admin.com',
             'password' => bcrypt('password')
         ])->has(
             Department::factory([
                'name'   => 'Admin Team',
                'active' => true
             ])
         )->create();

         $department = Department::query()->first();
         $user->update([
             'current_department_id' => $department->id
         ]);

         $serviceCatalogue = ServiceCatalogue::factory()->create();

         $tickets = Ticket::factory([
             'user_id'              => $user->id,
             'service_catalogue_id' => $serviceCatalogue->id,
             'department_id'        => $department->id
         ])->count(15)->create();

        $tickets->each(function ($ticket) {
            Report::factory([
                'ticket_id' => $ticket->id,
                'user_id'   => $ticket->user_id
            ])->count(4)->create();
        });
    }
}
