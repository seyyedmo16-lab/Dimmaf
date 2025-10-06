<?php

namespace Database\Seeders;

use App\Models\WhatDoWe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WhatDoWeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'id' => 1,
                'title_en' => 'Immigration',
                'title_fa' => 'مهاجرت',
                'description_en' => 'We cover the whole application submission process along with other requirements. With our services you only have to handle the documents to us and answer the questions for eligibility criteria.',
                'description_fa' => 'ما کل فرآیند ارسال درخواست را همراه با سایر الزامات پوشش می دهیم. با خدمات ما فقط باید مدارک را به ما تحویل دهید و به سؤالات مربوط به معیارهای واجد شرایط بودن پاسخ دهید.',
                'body_en' => '<h2>Immigration Services</h2><p>Our comprehensive immigration services help you navigate the complex process of moving to Canada. We provide expert guidance throughout your journey.</p>',
                'body_fa' => '<h2>خدمات مهاجرت</h2><p>خدمات جامع مهاجرت ما به شما کمک می‌کند تا فرآیند پیچیده مهاجرت به کانادا را طی کنید. ما راهنمایی متخصص در طول سفر شما ارائه می‌دهیم.</p>',
            ],
            [
                'id' => 2,
                'title_en' => 'Study Permits',
                'title_fa' => 'مجوز تحصیل',
                'description_en' => 'Get assistance with study permit applications and student visa processes. We help you understand the requirements and complete your application successfully.',
                'description_fa' => 'درخواست مجوز تحصیل و فرآیند ویزای دانشجویی را دریافت کنید. ما به شما کمک می‌کنیم تا الزامات را درک کنید و درخواست خود را با موفقیت تکمیل کنید.',
                'body_en' => '<h2>Study Permit Services</h2><p>We assist students in obtaining study permits for Canadian educational institutions. Our team ensures your application meets all requirements.</p>',
                'body_fa' => '<h2>خدمات مجوز تحصیل</h2><p>ما به دانشجویان در دریافت مجوز تحصیل برای مؤسسات آموزشی کانادایی کمک می‌کنیم. تیم ما اطمینان حاصل می‌کند که درخواست شما تمام الزامات را برآورده کند.</p>',
            ],
            [
                'id' => 3,
                'title_en' => 'International Student Admission',
                'title_fa' => 'پذیرش دانشجوی بین‌المللی',
                'description_en' => 'Comprehensive support for international students seeking admission to Canadian universities and colleges. We guide you through the entire process.',
                'description_fa' => 'پشتیبانی جامع برای دانشجویان بین‌المللی که به دنبال پذیرش در دانشگاه‌ها و کالج‌های کانادایی هستند. ما شما را در طول کل فرآیند راهنمایی می‌کنیم.',
                'body_en' => '<h2>International Student Admission</h2><p>We provide end-to-end support for international students applying to Canadian educational institutions.</p>',
                'body_fa' => '<h2>پذیرش دانشجوی بین‌المللی</h2><p>ما پشتیبانی کامل برای دانشجویان بین‌المللی که به مؤسسات آموزشی کانادایی درخواست می‌دهند ارائه می‌دهیم.</p>',
            ],
            [
                'id' => 4,
                'title_en' => 'Family Sponsorship',
                'title_fa' => 'حمایت خانوادگی',
                'description_en' => 'Reunite with your family members in Canada through our family sponsorship services. We help you understand the requirements and complete the process.',
                'description_fa' => 'از طریق خدمات حمایت خانوادگی ما با اعضای خانواده خود در کانادا متحد شوید. ما به شما کمک می‌کنیم تا الزامات را درک کنید و فرآیند را تکمیل کنید.',
                'body_en' => '<h2>Family Sponsorship</h2><p>Our family sponsorship services help you bring your loved ones to Canada legally and efficiently.</p>',
                'body_fa' => '<h2>حمایت خانوادگی</h2><p>خدمات حمایت خانوادگی ما به شما کمک می‌کند تا عزیزان خود را به صورت قانونی و کارآمد به کانادا بیاورید.</p>',
            ],
            [
                'id' => 5,
                'title_en' => 'Spousal Sponsorship Appeals',
                'title_fa' => 'درخواست تجدید نظر حمایت همسر',
                'description_en' => 'Expert assistance with spousal sponsorship appeals and complex immigration cases. We provide legal support and guidance.',
                'description_fa' => 'کمک متخصص در درخواست تجدید نظر حمایت همسر و پرونده‌های پیچیده مهاجرت. ما پشتیبانی و راهنمایی حقوقی ارائه می‌دهیم.',
                'body_en' => '<h2>Spousal Sponsorship Appeals</h2><p>We provide expert legal assistance for spousal sponsorship appeals and complex immigration matters.</p>',
                'body_fa' => '<h2>درخواست تجدید نظر حمایت همسر</h2><p>ما کمک حقوقی متخصص برای درخواست تجدید نظر حمایت همسر و مسائل پیچیده مهاجرت ارائه می‌دهیم.</p>',
            ],
            [
                'id' => 6,
                'title_en' => 'Business Immigration',
                'title_fa' => 'مهاجرت تجاری',
                'description_en' => 'Navigate business immigration programs and investor visas with our expert guidance. We help entrepreneurs and investors establish themselves in Canada.',
                'description_fa' => 'برنامه‌های مهاجرت تجاری و ویزای سرمایه‌گذار را با راهنمایی متخصص ما طی کنید. ما به کارآفرینان و سرمایه‌گذاران کمک می‌کنیم تا در کانادا مستقر شوند.',
                'body_en' => '<h2>Business Immigration</h2><p>Our business immigration services help entrepreneurs and investors establish successful businesses in Canada.</p>',
                'body_fa' => '<h2>مهاجرت تجاری</h2><p>خدمات مهاجرت تجاری ما به کارآفرینان و سرمایه‌گذاران کمک می‌کند تا کسب‌وکارهای موفق در کانادا راه‌اندازی کنند.</p>',
            ],
        ];

        foreach ($services as $service) {
            WhatDoWe::updateOrCreate(
                ['id' => $service['id']],
                array_merge($service, [
                    'slug' => Str::slug($service['title_en']),
                ])
            );
        }
    }
}