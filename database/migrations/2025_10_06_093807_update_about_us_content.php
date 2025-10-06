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
        DB::table('about_us')->update([
            'body_en' => '<h2>About DIMMAF - Direct Immigration Affairs</h2>
<p>DIMMAF is a leading immigration consulting firm specializing in Canadian immigration services. We have been helping individuals and families achieve their dreams of immigrating to Canada for over a decade.</p>

<h3>Our Mission</h3>
<p>Our mission is to provide comprehensive, reliable, and personalized immigration services to help our clients navigate the complex Canadian immigration system with confidence and success.</p>

<h3>Our Services</h3>
<ul>
<li><strong>Express Entry:</strong> Federal skilled worker programs</li>
<li><strong>Provincial Nominee Programs (PNP):</strong> Provincial immigration pathways</li>
<li><strong>Family Sponsorship:</strong> Reuniting families in Canada</li>
<li><strong>Study Permits:</strong> Educational opportunities in Canada</li>
<li><strong>Work Permits:</strong> Temporary and permanent work authorization</li>
<li><strong>Business Immigration:</strong> Entrepreneur and investor programs</li>
</ul>

<h3>Why Choose DIMMAF?</h3>
<ul>
<li>Licensed and regulated immigration consultants</li>
<li>Extensive experience with Canadian immigration law</li>
<li>Personalized service tailored to your needs</li>
<li>High success rate in applications</li>
<li>Comprehensive support throughout the process</li>
<li>Multilingual team (English, Farsi, and other languages)</li>
</ul>

<h3>Our Team</h3>
<p>Our team consists of experienced immigration consultants, lawyers, and support staff who are dedicated to helping you achieve your immigration goals. We stay up-to-date with the latest changes in Canadian immigration policy to ensure the best possible outcomes for our clients.</p>

<h3>Contact Us</h3>
<p>Ready to start your Canadian immigration journey? Contact our experienced team today for a consultation. We are here to help you every step of the way.</p>

<p><strong>Phone:</strong> +1 416 825 7730<br>
<strong>Email:</strong> info@dimmaf.com</p>',
            'body_fa' => '<h2>درباره DIMMAF - مشاوره امور مهاجرت به کانادا</h2>
<p>DIMMAF یک شرکت پیشرو در زمینه مشاوره مهاجرت است که در خدمات مهاجرت به کانادا تخصص دارد. ما بیش از یک دهه است که به افراد و خانواده‌ها کمک می‌کنیم تا رویای مهاجرت به کانادا را محقق کنند.</p>

<h3>ماموریت ما</h3>
<p>ماموریت ما ارائه خدمات جامع، قابل اعتماد و شخصی‌سازی شده مهاجرت است تا به مشتریانمان کمک کنیم با اعتماد و موفقیت در سیستم پیچیده مهاجرت کانادا حرکت کنند.</p>

<h3>خدمات ما</h3>
<ul>
<li><strong>ورودی سریع:</strong> برنامه‌های کارگر ماهر فدرال</li>
<li><strong>برنامه‌های نامزدی استانی (PNP):</strong> مسیرهای مهاجرت استانی</li>
<li><strong>حمایت خانوادگی:</strong> پیوند مجدد خانواده‌ها در کانادا</li>
<li><strong>مجوز تحصیل:</strong> فرصت‌های آموزشی در کانادا</li>
<li><strong>مجوز کار:</strong> مجوز کار موقت و دائمی</li>
<li><strong>مهاجرت تجاری:</strong> برنامه‌های کارآفرین و سرمایه‌گذار</li>
</ul>

<h3>چرا DIMMAF را انتخاب کنیم؟</h3>
<ul>
<li>مشاوران مهاجرت مجاز و تحت نظارت</li>
<li>تجربه گسترده در قانون مهاجرت کانادا</li>
<li>خدمات شخصی‌سازی شده متناسب با نیازهای شما</li>
<li>نرخ موفقیت بالا در درخواست‌ها</li>
<li>پشتیبانی جامع در طول فرآیند</li>
<li>تیم چندزبانه (انگلیسی، فارسی و سایر زبان‌ها)</li>
</ul>

<h3>تیم ما</h3>
<p>تیم ما شامل مشاوران مهاجرت با تجربه، وکلاء و کارکنان پشتیبانی است که متعهد به کمک به شما برای دستیابی به اهداف مهاجرتی‌تان هستند. ما همیشه با آخرین تغییرات در سیاست مهاجرت کانادا به‌روز هستیم تا بهترین نتایج ممکن را برای مشتریانمان تضمین کنیم.</p>

<h3>تماس با ما</h3>
<p>آماده شروع سفر مهاجرتی کانادایی‌تان هستید؟ امروز با تیم با تجربه ما تماس بگیرید تا مشاوره دریافت کنید. ما اینجا هستیم تا در هر مرحله به شما کمک کنیم.</p>

<p><strong>تلفن:</strong> +1 416 825 7730<br>
<strong>ایمیل:</strong> info@dimmaf.com</p>'
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
