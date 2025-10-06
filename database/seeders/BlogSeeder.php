<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = State::all();
        
        if ($states->isEmpty()) {
            $this->command->info('No states found. Please run StateSeeder first.');
            return;
        }

        $blogData = [
            [
                'title_en' => 'Immigration to Ontario - Complete Guide',
                'title_fa' => 'مهاجرت به انتاریو - راهنمای کامل',
                'body_en' => '<h2>Immigration to Ontario</h2><p>Ontario is Canada\'s most populous province and home to Toronto, the country\'s largest city. It offers numerous immigration opportunities through various programs.</p><h3>Ontario Immigrant Nominee Program (OINP)</h3><p>The OINP allows Ontario to nominate individuals for permanent residence based on their skills and experience.</p><h3>Express Entry</h3><p>Ontario frequently issues Notifications of Interest (NOIs) to Express Entry candidates.</p>',
                'body_fa' => '<h2>مهاجرت به انتاریو</h2><p>انتاریو پرجمعیت‌ترین استان کانادا و خانه تورنتو، بزرگترین شهر کشور است. این استان فرصت‌های مهاجرتی متعددی از طریق برنامه‌های مختلف ارائه می‌دهد.</p><h3>برنامه نامزدی مهاجر انتاریو (OINP)</h3><p>OINP به انتاریو اجازه می‌دهد افراد را بر اساس مهارت‌ها و تجربه‌شان برای اقامت دائم نامزد کند.</p><h3>ورودی سریع</h3><p>انتاریو اغلب اعلان‌های علاقه‌مندی (NOI) به نامزدهای ورودی سریع صادر می‌کند.</p>',
                'state_id' => $states->where('name', 'Ontario')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'British Columbia Immigration Programs',
                'title_fa' => 'برنامه‌های مهاجرت بریتیش کلمبیا',
                'body_en' => '<h2>British Columbia Immigration</h2><p>BC is known for its beautiful landscapes and strong economy. The province offers several immigration pathways.</p><h3>BC Provincial Nominee Program</h3><p>The BC PNP targets skilled workers, international graduates, and entrepreneurs.</p><h3>Tech Pilot Program</h3><p>BC\'s Tech Pilot is designed to attract technology workers to the province.</p>',
                'body_fa' => '<h2>مهاجرت بریتیش کلمبیا</h2><p>BC به دلیل مناظر زیبا و اقتصاد قوی شناخته شده است. این استان چندین مسیر مهاجرتی ارائه می‌دهد.</p><h3>برنامه نامزدی استانی BC</h3><p>BC PNP کارگران ماهر، فارغ‌التحصیلان بین‌المللی و کارآفرینان را هدف قرار می‌دهد.</p><h3>برنامه آزمایشی فناوری</h3><p>Tech Pilot BC برای جذب کارگران فناوری به استان طراحی شده است.</p>',
                'state_id' => $states->where('name', 'British Columbia')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Alberta Immigration Opportunities',
                'title_fa' => 'فرصت‌های مهاجرت آلبرتا',
                'body_en' => '<h2>Alberta Immigration</h2><p>Alberta is known for its oil and gas industry and offers various immigration programs.</p><h3>Alberta Immigrant Nominee Program</h3><p>The AINP helps Alberta meet its economic and labor market needs.</p><h3>Alberta Opportunity Stream</h3><p>This stream is for temporary foreign workers already working in Alberta.</p>',
                'body_fa' => '<h2>مهاجرت آلبرتا</h2><p>آلبرتا به دلیل صنعت نفت و گاز شناخته شده است و برنامه‌های مهاجرتی مختلفی ارائه می‌دهد.</p><h3>برنامه نامزدی مهاجر آلبرتا</h3><p>AINP به آلبرتا کمک می‌کند تا نیازهای اقتصادی و بازار کار خود را برآورده کند.</p><h3>جریان فرصت آلبرتا</h3><p>این جریان برای کارگران خارجی موقت است که قبلاً در آلبرتا کار می‌کنند.</p>',
                'state_id' => $states->where('name', 'Alberta')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Quebec Immigration Programs',
                'title_fa' => 'برنامه‌های مهاجرت کبک',
                'body_en' => '<h2>Quebec Immigration</h2><p>Quebec has its own immigration system separate from the federal programs.</p><h3>Quebec Skilled Worker Program</h3><p>The QSWP is for skilled workers who want to settle in Quebec.</p><h3>Quebec Experience Program</h3><p>This program is for temporary workers and international students in Quebec.</p>',
                'body_fa' => '<h2>مهاجرت کبک</h2><p>کبک سیستم مهاجرتی مخصوص خود را دارد که جدا از برنامه‌های فدرال است.</p><h3>برنامه کارگر ماهر کبک</h3><p>QSWP برای کارگران ماهری است که می‌خواهند در کبک ساکن شوند.</p><h3>برنامه تجربه کبک</h3><p>این برنامه برای کارگران موقت و دانشجویان بین‌المللی در کبک است.</p>',
                'state_id' => $states->where('name', 'Quebec')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Manitoba Immigration Guide',
                'title_fa' => 'راهنمای مهاجرت مانیتوبا',
                'body_en' => '<h2>Manitoba Immigration</h2><p>Manitoba offers various immigration programs through the Manitoba Provincial Nominee Program.</p><h3>Skilled Workers in Manitoba</h3><p>This stream is for skilled workers already working in Manitoba.</p><h3>International Education Stream</h3><p>This stream is for international graduates from Manitoba institutions.</p>',
                'body_fa' => '<h2>مهاجرت مانیتوبا</h2><p>مانیتوبا از طریق برنامه نامزدی استانی مانیتوبا برنامه‌های مهاجرتی مختلفی ارائه می‌دهد.</p><h3>کارگران ماهر در مانیتوبا</h3><p>این جریان برای کارگران ماهری است که قبلاً در مانیتوبا کار می‌کنند.</p><h3>جریان آموزش بین‌المللی</h3><p>این جریان برای فارغ‌التحصیلان بین‌المللی از مؤسسات مانیتوبا است.</p>',
                'state_id' => $states->where('name', 'Manitoba')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Saskatchewan Immigration Programs',
                'title_fa' => 'برنامه‌های مهاجرت ساسکاچوان',
                'body_en' => '<h2>Saskatchewan Immigration</h2><p>Saskatchewan offers immigration opportunities through the Saskatchewan Immigrant Nominee Program.</p><h3>International Skilled Worker</h3><p>This category is for skilled workers from outside Canada.</p><h3>Saskatchewan Experience</h3><p>This category is for workers already in Saskatchewan.</p>',
                'body_fa' => '<h2>مهاجرت ساسکاچوان</h2><p>ساسکاچوان از طریق برنامه نامزدی مهاجر ساسکاچوان فرصت‌های مهاجرتی ارائه می‌دهد.</p><h3>کارگر ماهر بین‌المللی</h3><p>این دسته برای کارگران ماهر از خارج کانادا است.</p><h3>تجربه ساسکاچوان</h3><p>این دسته برای کارگرانی است که قبلاً در ساسکاچوان هستند.</p>',
                'state_id' => $states->where('name', 'Saskatchewan')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Nova Scotia Immigration',
                'title_fa' => 'مهاجرت نوا اسکوشیا',
                'body_en' => '<h2>Nova Scotia Immigration</h2><p>Nova Scotia offers various immigration programs through the Nova Scotia Nominee Program.</p><h3>Nova Scotia Labour Market Priorities</h3><p>This stream targets specific occupations in demand.</p><h3>Nova Scotia Experience</h3><p>This stream is for workers already in Nova Scotia.</p>',
                'body_fa' => '<h2>مهاجرت نوا اسکوشیا</h2><p>نوا اسکوشیا از طریق برنامه نامزدی نوا اسکوشیا برنامه‌های مهاجرتی مختلفی ارائه می‌دهد.</p><h3>اولویت‌های بازار کار نوا اسکوشیا</h3><p>این جریان مشاغل خاص مورد نیاز را هدف قرار می‌دهد.</p><h3>تجربه نوا اسکوشیا</h3><p>این جریان برای کارگرانی است که قبلاً در نوا اسکوشیا هستند.</p>',
                'state_id' => $states->where('name', 'Nova Scotia')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'New Brunswick Immigration',
                'title_fa' => 'مهاجرت نیو برانزویک',
                'body_en' => '<h2>New Brunswick Immigration</h2><p>New Brunswick offers immigration opportunities through the New Brunswick Provincial Nominee Program.</p><h3>New Brunswick Express Entry</h3><p>This stream is linked to the federal Express Entry system.</p><h3>New Brunswick Skilled Workers</h3><p>This stream is for skilled workers with job offers in New Brunswick.</p>',
                'body_fa' => '<h2>مهاجرت نیو برانزویک</h2><p>نیو برانزویک از طریق برنامه نامزدی استانی نیو برانزویک فرصت‌های مهاجرتی ارائه می‌دهد.</p><h3>ورودی سریع نیو برانزویک</h3><p>این جریان به سیستم ورودی سریع فدرال متصل است.</p><h3>کارگران ماهر نیو برانزویک</h3><p>این جریان برای کارگران ماهری است که پیشنهاد کار در نیو برانزویک دارند.</p>',
                'state_id' => $states->where('name', 'New Brunswick')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Yukon Immigration Programs',
                'title_fa' => 'برنامه‌های مهاجرت یوکان',
                'body_en' => '<h2>Yukon Immigration</h2><p>Yukon offers unique immigration opportunities through the Yukon Nominee Program (YNP).</p><h3>Yukon Nominee Program</h3><p>The YNP helps Yukon meet its economic and labor market needs by nominating skilled workers.</p>',
                'body_fa' => '<h2>مهاجرت یوکان</h2><p>یوکان از طریق برنامه نامزدی یوکان (YNP) فرصت‌های مهاجرتی منحصر به فردی ارائه می‌دهد.</p><h3>برنامه نامزدی یوکان</h3><p>YNP به یوکان کمک می‌کند تا نیازهای اقتصادی و بازار کار خود را با نامزد کردن کارگران ماهر برآورده کند.</p>',
                'state_id' => $states->where('name', 'Yukon')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Northwest Territories Immigration',
                'title_fa' => 'مهاجرت قلمروهای شمال غرب',
                'body_en' => '<h2>Northwest Territories Immigration</h2><p>Northwest Territories offers immigration opportunities through the Northwest Territories Nominee Program.</p><h3>NTNP Programs</h3><p>The Northwest Territories Nominee Program helps address labor market needs.</p>',
                'body_fa' => '<h2>مهاجرت قلمروهای شمال غرب</h2><p>قلمروهای شمال غرب از طریق برنامه نامزدی قلمروهای شمال غرب فرصت‌های مهاجرتی ارائه می‌دهد.</p><h3>برنامه‌های NTNP</h3><p>برنامه نامزدی قلمروهای شمال غرب به رفع نیازهای بازار کار کمک می‌کند.</p>',
                'state_id' => $states->where('name', 'Northwest Territories')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Nunavut Immigration Guide',
                'title_fa' => 'راهنمای مهاجرت نوناووت',
                'body_en' => '<h2>Nunavut Immigration</h2><p>Nunavut offers unique opportunities for those looking to immigrate to Canada\'s Arctic region.</p><h3>Nunavut Opportunities</h3><p>Explore various pathways to immigrate to Nunavut and contribute to its growing economy.</p>',
                'body_fa' => '<h2>مهاجرت نوناووت</h2><p>نوناووت فرصت‌های منحصر به فردی برای کسانی که می‌خواهند به منطقه قطب شمال کانادا مهاجرت کنند ارائه می‌دهد.</p><h3>فرصت‌های نوناووت</h3><p>مسیرهای مختلف مهاجرت به نوناووت را کاوش کنید و به اقتصاد در حال رشد آن کمک کنید.</p>',
                'state_id' => $states->where('name', 'Nunavut')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Newfoundland and Labrador Immigration',
                'title_fa' => 'مهاجرت نیوفاندلند و لابرادور',
                'body_en' => '<h2>Newfoundland and Labrador Immigration</h2><p>Newfoundland and Labrador offers immigration opportunities through the Newfoundland and Labrador Provincial Nominee Program.</p><h3>NLPNP Streams</h3><p>The NLPNP includes various streams for skilled workers, international graduates, and entrepreneurs.</p>',
                'body_fa' => '<h2>مهاجرت نیوفاندلند و لابرادور</h2><p>نیوفاندلند و لابرادور از طریق برنامه نامزدی استانی نیوفاندلند و لابرادور فرصت‌های مهاجرتی ارائه می‌دهد.</p><h3>جریان‌های NLPNP</h3><p>NLPNP شامل جریان‌های مختلف برای کارگران ماهر، فارغ‌التحصیلان بین‌المللی و کارآفرینان است.</p>',
                'state_id' => $states->where('name', 'Newfoundland and Labrador')->first()?->id ?? $states->first()->id,
            ],
            [
                'title_en' => 'Prince Edward Island Immigration',
                'title_fa' => 'مهاجرت جزیره پرنس ادوارد',
                'body_en' => '<h2>Prince Edward Island Immigration</h2><p>Prince Edward Island offers immigration opportunities through the Prince Edward Island Provincial Nominee Program.</p><h3>PEI PNP Categories</h3><p>The PEI PNP includes categories for skilled workers, international graduates, and business immigrants.</p>',
                'body_fa' => '<h2>مهاجرت جزیره پرنس ادوارد</h2><p>جزیره پرنس ادوارد از طریق برنامه نامزدی استانی جزیره پرنس ادوارد فرصت‌های مهاجرتی ارائه می‌دهد.</p><h3>دسته‌بندی‌های PEI PNP</h3><p>PEI PNP شامل دسته‌بندی‌هایی برای کارگران ماهر، فارغ‌التحصیلان بین‌المللی و مهاجران تجاری است.</p>',
                'state_id' => $states->where('name', 'Prince Edward Island')->first()?->id ?? $states->first()->id,
            ],
        ];

        foreach ($blogData as $blog) {
            Blog::create(array_merge($blog, [
                'slug' => Str::slug($blog['title_en']),
                'is_deleted' => false,
            ]));
        }

        $this->command->info('Blog data seeded successfully!');
    }
}
