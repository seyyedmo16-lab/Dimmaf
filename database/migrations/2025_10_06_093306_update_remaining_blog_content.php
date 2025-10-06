<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update British Columbia blog content
        DB::table('blogs')->where('state_id', 15)->update([
            'body_en' => '<h2>British Columbia Immigration Programs</h2>
<p>British Columbia is known for its beautiful landscapes, mild climate, and strong economy. With Vancouver as its largest city, BC offers excellent opportunities for immigrants.</p>

<h3>BC Provincial Nominee Program (BC PNP)</h3>
<p>The BC PNP targets skilled workers, international graduates, and entrepreneurs. Key streams include:</p>
<ul>
<li><strong>Skilled Worker:</strong> For workers with job offers in BC</li>
<li><strong>International Graduate:</strong> For recent graduates from Canadian institutions</li>
<li><strong>International Post-Graduate:</strong> For PhD and Master\'s graduates</li>
<li><strong>Entry Level and Semi-Skilled:</strong> For workers in tourism, hospitality, and food processing</li>
</ul>

<h3>Tech Pilot Program</h3>
<p>BC\'s Tech Pilot is designed to attract technology workers to the province. It offers faster processing for tech workers in 29 eligible occupations.</p>

<h3>Why Choose British Columbia?</h3>
<ul>
<li>Mild climate and beautiful natural scenery</li>
<li>Strong technology sector in Vancouver</li>
<li>Excellent education system</li>
<li>Diverse cultural communities</li>
<li>Gateway to Asia-Pacific markets</li>
</ul>',
            'body_fa' => '<h2>برنامه‌های مهاجرت بریتیش کلمبیا</h2>
<p>بریتیش کلمبیا به دلیل مناظر زیبا، آب و هوای معتدل و اقتصاد قوی شناخته شده است. با ونکوور به عنوان بزرگترین شهر، BC فرصت‌های عالی برای مهاجران ارائه می‌دهد.</p>

<h3>برنامه نامزدی استانی BC (BC PNP)</h3>
<p>BC PNP کارگران ماهر، فارغ‌التحصیلان بین‌المللی و کارآفرینان را هدف قرار می‌دهد. جریان‌های کلیدی شامل:</p>
<ul>
<li><strong>کارگر ماهر:</strong> برای کارگران با پیشنهاد کار در BC</li>
<li><strong>فارغ‌التحصیل بین‌المللی:</strong> برای فارغ‌التحصیلان اخیر از مؤسسات کانادایی</li>
<li><strong>فارغ‌التحصیل بین‌المللی تحصیلات تکمیلی:</strong> برای فارغ‌التحصیلان دکترا و کارشناسی ارشد</li>
<li><strong>سطح ورودی و نیمه ماهر:</strong> برای کارگران در گردشگری، مهمان‌نوازی و فرآوری مواد غذایی</li>
</ul>

<h3>برنامه آزمایشی فناوری</h3>
<p>Tech Pilot BC برای جذب کارگران فناوری به استان طراحی شده است. این برنامه پردازش سریع‌تر برای کارگران فناوری در 29 شغل واجد شرایط ارائه می‌دهد.</p>

<h3>چرا بریتیش کلمبیا را انتخاب کنیم؟</h3>
<ul>
<li>آب و هوای معتدل و مناظر طبیعی زیبا</li>
<li>بخش فناوری قوی در ونکوور</li>
<li>سیستم آموزشی عالی</li>
<li>جوامع فرهنگی متنوع</li>
<li>دروازه به بازارهای آسیا-اقیانوسیه</li>
</ul>'
        ]);

        // Update Alberta blog content
        DB::table('blogs')->where('state_id', 14)->update([
            'body_en' => '<h2>Alberta Immigration Opportunities</h2>
<p>Alberta is known for its oil and gas industry, beautiful Rocky Mountains, and strong economy. The province offers various immigration programs for skilled workers.</p>

<h3>Alberta Immigrant Nominee Program (AINP)</h3>
<p>The AINP helps Alberta meet its economic and labor market needs. Key streams include:</p>
<ul>
<li><strong>Alberta Opportunity Stream:</strong> For temporary foreign workers already working in Alberta</li>
<li><strong>Alberta Express Entry Stream:</strong> For candidates in the federal Express Entry pool</li>
<li><strong>Self-Employed Farmer Stream:</strong> For experienced farmers</li>
</ul>

<h3>Why Choose Alberta?</h3>
<ul>
<li>No provincial sales tax</li>
<li>Strong job market in energy sector</li>
<li>Beautiful natural landscapes</li>
<li>Affordable cost of living</li>
<li>Growing technology sector in Calgary</li>
</ul>',
            'body_fa' => '<h2>فرصت‌های مهاجرت آلبرتا</h2>
<p>آلبرتا به دلیل صنعت نفت و گاز، کوه‌های راکی زیبا و اقتصاد قوی شناخته شده است. این استان برنامه‌های مهاجرتی مختلفی برای کارگران ماهر ارائه می‌دهد.</p>

<h3>برنامه نامزدی مهاجر آلبرتا (AINP)</h3>
<p>AINP به آلبرتا کمک می‌کند تا نیازهای اقتصادی و بازار کار خود را برآورده کند. جریان‌های کلیدی شامل:</p>
<ul>
<li><strong>جریان فرصت آلبرتا:</strong> برای کارگران خارجی موقت که قبلاً در آلبرتا کار می‌کنند</li>
<li><strong>جریان ورودی سریع آلبرتا:</strong> برای نامزدهای موجود در استخر ورودی سریع فدرال</li>
<li><strong>جریان کشاورز خوداشتغال:</strong> برای کشاورزان با تجربه</li>
</ul>

<h3>چرا آلبرتا را انتخاب کنیم؟</h3>
<ul>
<li>بدون مالیات فروش استانی</li>
<li>بازار کار قوی در بخش انرژی</li>
<li>مناظر طبیعی زیبا</li>
<li>هزینه زندگی مقرون به صرفه</li>
<li>بخش فناوری در حال رشد در کلگری</li>
</ul>'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
