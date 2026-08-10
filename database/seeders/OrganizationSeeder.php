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

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        // =========================================================
        // PERIOD
        // =========================================================

        $period = Period::create([
            'name' => 'Kabinet Arunika',
            'year' => 2026,
            'description' => 'Periode kepengurusan organisasi tahun 2026.',
            'start_date' => '2026-01-01',
            'end_date' => '2026-12-31',
            'is_active' => true,
        ]);

        // =========================================================
        // CABINET
        // =========================================================

        $cabinet = Cabinet::create([
            'period_id' => $period->id,
            'name' => 'Kabinet Arunika',
            'tagline' => 'Bersama Bertumbuh, Bersama Berdampak',
            'description' => 'Kabinet organisasi periode 2026.',
        ]);

        // =========================================================
        // ORGANIZATIONAL UNITS
        // =========================================================

        $bph = OrganizationalUnit::create([
            'cabinet_id' => $cabinet->id,
            'parent_id' => null,
            'name' => 'Badan Pengurus Harian',
            'type' => 'bph',
            'short_name' => 'BPH',
            'description' => 'Badan Pengurus Harian organisasi.',
            'tasks' => 'Mengkoordinasikan seluruh kegiatan organisasi.',
            'sort_order' => 1,
        ]);

        $it = OrganizationalUnit::create([
            'cabinet_id' => $cabinet->id,
            'parent_id' => null,
            'name' => 'Divisi Teknologi Informasi',
            'type' => 'division',
            'short_name' => 'IT',
            'description' => 'Divisi yang menangani teknologi dan sistem informasi.',
            'tasks' => 'Mengembangkan dan mengelola sistem informasi organisasi.',
            'sort_order' => 2,
        ]);

        $webDev = OrganizationalUnit::create([
            'cabinet_id' => $cabinet->id,
            'parent_id' => $it->id,
            'name' => 'Departemen Web Development',
            'type' => 'department',
            'short_name' => 'WebDev',
            'description' => 'Departemen pengembangan aplikasi berbasis web.',
            'tasks' => 'Mengembangkan dan memelihara aplikasi web organisasi.',
            'sort_order' => 1,
        ]);

        // =========================================================
        // POSITIONS - BPH
        // =========================================================

        $ketua = Position::create([
            'organizational_unit_id' => $bph->id,
            'name' => 'Ketua',
            'description' => 'Memimpin dan mengkoordinasikan organisasi.',
            'sort_order' => 1,
        ]);

        $wakilKetua = Position::create([
            'organizational_unit_id' => $bph->id,
            'name' => 'Wakil Ketua',
            'description' => 'Mendampingi ketua dalam menjalankan organisasi.',
            'sort_order' => 2,
        ]);

        $sekretaris = Position::create([
            'organizational_unit_id' => $bph->id,
            'name' => 'Sekretaris',
            'description' => 'Mengelola administrasi dan dokumentasi organisasi.',
            'sort_order' => 3,
        ]);

        // =========================================================
        // POSITIONS - IT
        // =========================================================

        $kepalaDivisi = Position::create([
            'organizational_unit_id' => $it->id,
            'name' => 'Kepala Divisi',
            'description' => 'Memimpin dan mengkoordinasikan Divisi Teknologi Informasi.',
            'sort_order' => 1,
        ]);

        // =========================================================
        // POSITIONS - WEB DEVELOPMENT
        // =========================================================

        $kepalaDepartemen = Position::create([
            'organizational_unit_id' => $webDev->id,
            'name' => 'Kepala Departemen',
            'description' => 'Memimpin Departemen Web Development.',
            'sort_order' => 1,
        ]);

        $frontend = Position::create([
            'organizational_unit_id' => $webDev->id,
            'name' => 'Staff Frontend',
            'description' => 'Mengembangkan antarmuka aplikasi web.',
            'sort_order' => 2,
        ]);

        $backend = Position::create([
            'organizational_unit_id' => $webDev->id,
            'name' => 'Staff Backend',
            'description' => 'Mengembangkan sistem backend dan database.',
            'sort_order' => 3,
        ]);

        // =========================================================
        // MEMBERS
        // =========================================================

        $member1 = Member::create([
            'position_id' => $ketua->id,
            'name' => 'Muhammad Arkan',
            'bio' => 'Ketua organisasi periode 2026.',
            'instagram_url' => 'https://instagram.com/example',
            'linkedin_url' => 'https://linkedin.com/in/example',
            'sort_order' => 1,
        ]);

        $member2 = Member::create([
            'position_id' => $wakilKetua->id,
            'name' => 'Alya Putri',
            'bio' => 'Wakil Ketua organisasi periode 2026.',
            'sort_order' => 1,
        ]);

        $member3 = Member::create([
            'position_id' => $sekretaris->id,
            'name' => 'Raka Pratama',
            'bio' => 'Sekretaris organisasi periode 2026.',
            'sort_order' => 1,
        ]);

        $member4 = Member::create([
            'position_id' => $kepalaDivisi->id,
            'name' => 'Dimas Ramadhan',
            'bio' => 'Kepala Divisi Teknologi Informasi.',
            'sort_order' => 1,
        ]);

        $member5 = Member::create([
            'position_id' => $kepalaDepartemen->id,
            'name' => 'Fajar Nugraha',
            'bio' => 'Kepala Departemen Web Development.',
            'sort_order' => 1,
        ]);

        $member6 = Member::create([
            'position_id' => $frontend->id,
            'name' => 'Nadia Safitri',
            'bio' => 'Staff Frontend Web Development.',
            'sort_order' => 1,
        ]);

        $member7 = Member::create([
            'position_id' => $backend->id,
            'name' => 'Rizky Maulana',
            'bio' => 'Staff Backend Web Development.',
            'sort_order' => 1,
        ]);

        // =========================================================
        // PROGRAMS
        // =========================================================

        $workshop = Program::create([
            'organizational_unit_id' => $webDev->id,
            'name' => 'Workshop Web Development',
            'slug' => 'workshop-web-development',
            'description' => 'Workshop untuk meningkatkan kemampuan pengembangan aplikasi web.',
            'status' => 'completed',
            'start_date' => '2026-08-10',
            'end_date' => '2026-08-10',
            'sort_order' => 1,
        ]);

        $website = Program::create([
            'organizational_unit_id' => $webDev->id,
            'name' => 'Pengembangan Website Organisasi',
            'slug' => 'pengembangan-website-organisasi',
            'description' => 'Pengembangan website resmi organisasi.',
            'status' => 'ongoing',
            'start_date' => '2026-07-01',
            'end_date' => null,
            'sort_order' => 2,
        ]);

        // =========================================================
        // MEMBER <-> PROGRAM
        // =========================================================

        $workshop->members()->attach([
            $member5->id,
            $member6->id,
            $member7->id,
        ]);

        $website->members()->attach([
            $member4->id,
            $member5->id,
            $member6->id,
            $member7->id,
        ]);

        // =========================================================
        // ACHIEVEMENTS
        // =========================================================

        $achievement = Achievement::create([
            'organizational_unit_id' => $webDev->id,
            'title' => 'Juara 1 Web Development Competition',
            'description' => 'Meraih juara pertama dalam kompetisi pengembangan website.',
            'achievement_type' => 'Competition',
            'sort_order' => 1,
        ]);

        $achievement->members()->attach([
            $member5->id,
            $member6->id,
            $member7->id,
        ]);

        // =========================================================
        // DOCUMENTATION
        // =========================================================

        $documentation = Documentation::create([
            'organizational_unit_id' => $webDev->id,
            'title' => 'Workshop Web Development',
            'description' => 'Dokumentasi kegiatan workshop web development.',
            'event_date' => '2026-08-10',
            'sort_order' => 1,
        ]);

        // Satu kegiatan -> banyak foto
        DocumentationImage::create([
            'documentation_id' => $documentation->id,
            'image_path' => 'documentations/workshop-1.jpg',
            'caption' => 'Pembukaan workshop',
            'sort_order' => 1,
        ]);

        DocumentationImage::create([
            'documentation_id' => $documentation->id,
            'image_path' => 'documentations/workshop-2.jpg',
            'caption' => 'Materi web development',
            'sort_order' => 2,
        ]);

        DocumentationImage::create([
            'documentation_id' => $documentation->id,
            'image_path' => 'documentations/workshop-3.jpg',
            'caption' => 'Peserta mengikuti workshop',
            'sort_order' => 3,
        ]);
    }
}