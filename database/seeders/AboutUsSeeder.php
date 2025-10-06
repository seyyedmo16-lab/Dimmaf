<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::updateOrCreate(
            ['id' => 1],
            [
                'image' => 'images/about-us/1653132831.jpg',
                'body_en' => '<div class="entry-img" style="align-self:center; margin-bottom:2rem; margin-left:2rem; margin-right:2rem; margin-top:2rem">&nbsp;</div><h2>Member of the college of immigration</h2><h3>Fariborz Azari Sharghi</h3><h3>And citizenship consultants</h3><div class="entry-content tab-pane"><ul><li>More than 15 years experience in the field of Canada Immigration</li><li>Certificate of achievement in Immigration Consultant with Honours from Humber College (2010)</li><li>Commissioner of Oath</li><li>French Language Diploma</li></ul></div><h4>and the name DIMMAF (Direct Immigration Affairs)</h4>',
                'body_fa' => '<div class="entry-img" style="align-self:center; margin-bottom:2rem; margin-left:2rem; margin-right:2rem; margin-top:2rem">&nbsp;</div><h2>عضو کالج مهاجرت و مشاوران شهروندی</h2><h3>فریبرز آذری شرقی</h3><div class="entry-content tab-pane"><ul><li>بیش از 15 سال تجربه در زمینه مهاجرت به کانادا</li><li>گواهی موفقیت در مشاور مهاجرت با افتخارات از کالج Humber (2010)</li><li>کمیسر سوگند نامه</li><li>دیپلم زبان فرانسه</li></ul><h4>و نام DIMMAF (Direct Immigration Affairs : امور مهاجرتی مستقیم)</h4></div>'
            ]
        );
    }
}
