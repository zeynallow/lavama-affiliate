<?php

namespace Database\Seeders;

use App\Models\Program\ProgramPayoutPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramPayoutPeriods extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramPayoutPeriod::insert([
            ['id' => 1, 'name' => 'Daily'],
            ['id' => 2, 'name' => 'Weekly'],
            ['id' => 3, 'name' => 'Monthly']
        ]);
    }
}
