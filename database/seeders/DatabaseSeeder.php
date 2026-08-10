<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Cabinet;
use App\Models\Documentation;
use App\Models\DocumentationImage;
use App\Models\Member;
use App\Models\OrganizationalUnit;
use App\Models\Period;
use App\Models\Position;
use App\Models\Program;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            OrganizationSeeder::class,
        ]);
    }
}
