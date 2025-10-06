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
        // Update Ontario blog content
        DB::table('blogs')->where('state_id', 11)->update([
            'body_en' => '<h2>Immigration to Ontario - Complete Guide</h2>
<p>Ontario is Canada\'s most populous province and home to Toronto, the country\'s largest city. With over 14 million residents, Ontario offers numerous immigration opportunities through various programs.</p>

<h3>Ontario Immigrant Nominee Program (OINP)</h3>
<p>The OINP allows Ontario to nominate individuals for permanent residence based on their skills and experience. The program includes several streams:</p>
<ul>
<li><strong>Human Capital Priorities Stream:</strong> For skilled workers with work experience</li>
<li><strong>French-Speaking Skilled Worker Stream:</strong> For French-speaking skilled workers</li>
<li><strong>Skilled Trades Stream:</strong> For workers in skilled trades</li>
<li><strong>International Student Streams:</strong> For international graduates</li>
</ul>

<h3>Express Entry</h3>
<p>Ontario frequently issues Notifications of Interest (NOIs) to Express Entry candidates. The province has strong ties to the federal Express Entry system.</p>

<h3>Why Choose Ontario?</h3>
<p>Ontario offers excellent opportunities for immigrants including:</p>
<ul>
<li>Strong job market in Toronto, Ottawa, and other major cities</li>
<li>World-class education system</li>
<li>Diverse cultural communities</li>
<li>Excellent healthcare system</li>
<li>Beautiful natural landscapes</li>
</ul>

<p>Contact our immigration experts to learn more about your options for immigrating to Ontario.</p>',
            'body_fa' => '<h2>مهاجرت به انتاریو - راهنمای کامل</h2>
<p>انتاریو پرجمعیت‌ترین استان کانادا و خانه تورنتو، بزرگترین شهر کشور است. با بیش از 14 میلیون ساکن، انتاریو فرصت‌های مهاجرتی متعددی از طریق برنامه‌های مختلف ارائه می‌دهد.</p>

<h3>برنامه نامزدی مهاجر انتاریو (OINP)</h3>
<p>OINP به انتاریو اجازه می‌دهد افراد را بر اساس مهارت‌ها و تجربه‌شان برای اقامت دائم نامزد کند. این برنامه شامل چندین جریان است:</p>
<ul>
<li><strong>جریان اولویت سرمایه انسانی:</strong> برای کارگران ماهر با تجربه کاری</li>
<li><strong>جریان کارگر ماهر فرانسوی زبان:</strong> برای کارگران ماهر فرانسوی زبان</li>
<li><strong>جریان مشاغل ماهر:</strong> برای کارگران در مشاغل ماهر</li>
<li><strong>جریان‌های دانشجوی بین‌المللی:</strong> برای فارغ‌التحصیلان بین‌المللی</li>
</ul>

<h3>ورودی سریع</h3>
<p>انتاریو اغلب اعلان‌های علاقه‌مندی (NOI) به نامزدهای ورودی سریع صادر می‌کند. این استان ارتباط قوی با سیستم ورودی سریع فدرال دارد.</p>

<h3>چرا انتاریو را انتخاب کنیم؟</h3>
<p>انتاریو فرصت‌های عالی برای مهاجران ارائه می‌دهد از جمله:</p>
<ul>
<li>بازار کار قوی در تورنتو، اتاوا و سایر شهرهای بزرگ</li>
<li>سیستم آموزشی در سطح جهانی</li>
<li>جوامع فرهنگی متنوع</li>
<li>سیستم بهداشت و درمان عالی</li>
<li>مناظر طبیعی زیبا</li>
</ul>

<p>برای کسب اطلاعات بیشتر در مورد گزینه‌های مهاجرت به انتاریو با کارشناسان مهاجرت ما تماس بگیرید.</p>'
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
