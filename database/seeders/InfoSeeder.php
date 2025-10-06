<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $infos = [
            [
                'title_en' => 'Study permit',
                'title_fa' => 'مجوز تحصیلی',
                'image' => 'images/info/1653126172.jpg',
                'body_en' => '<h3>Get guarantee success with our advisors</h3><p>The study permit is a document that allows foreign nationals to study at designated learning institutions (DLIs) in Canada. Make sure you have all the documents you need before you apply. You should apply before you travel to Canada.</p><p>Your study permit is not a visa. It doesn\'t let you enter Canada. You may also need a visitor visa or an electronic travel authorization (eTA).</p><p>A study permit is usually valid for the length of your study program, plus an extra 90 days. The 90 days let you prepare to leave Canada or apply to extend your stay.</p><p>If you leave Canada during your studies, you\'ll need to make sure you meet all the requirements to return to Canada at this time.</p>',
                'body_fa' => '<h3>&nbsp;</h3><p>مجوز تحصیل سندی است که به اتباع خارجی اجازه می دهد در موسسات آموزشی تعیین شده (DLIs) در کانادا تحصیل کنند. قبل از درخواست، مطمئن شوید که تمام مدارک مورد نیاز خود را دارید. قبل از سفر به کانادا باید درخواست دهید.</p><p>مجوز تحصیل شما ویزا نیست. به شما اجازه ورود به کانادا را نمی&zwnj;دهد. همچنین ممکن است به ویزای بازدیدکننده یا مجوز سفر الکترونیکی (eTA) نیاز داشته باشید.</p><p>مجوز تحصیلی، معمولاً برای مدت زمان تحصیلی شما به اضافه 90 روز اضافی، معتبر است. این 90 روز به شما این امکان را می&zwnj;دهد تا برای ترک کانادا یا درخواست تمدید اقامت خود آماده شوید.</p><p>اگر در طول تحصیل، کانادا را ترک کردید، باید مطمئن شوید که تمام شرایط لازم برای بازگشت به کانادا را دارید.</p>'
            ],
            [
                'title_en' => 'Who can apply',
                'title_fa' => 'چه کسی می‌تواند درخواست دهد',
                'image' => 'images/info/1653126188.jpg',
                'body_en' => '<h3>Eligibility requirements:</h3><p>You can study in Canada if you</p><p>1) your tuition fees</p><p>2) living expenses for yourself and any family members who come with you to Canada and</p><p>3) return transportation for yourself and any family members who come with you to Canada</p><ul><li>are enrolled at a designated learning institution (DLI)</li><li>If you\'re coming from outside Canada to study as an international student, your DLI must be on the list of DLIs with an approved COVID-19 readiness plan.</li><li>prove you have enough money to pay for:</li><li>obey the law, have no criminal record and get a police certificate (if required)</li><li>are in good health and get a medical exam (if required) and</li><li>prove to an officer that you will leave Canada when your study permit expires</li></ul>',
                'body_fa' => '<h3>الزامات واجد شرایط بودن</h3><p>می توانید در کانادا تحصیل کنید اگر:</p><p>دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p><ul><li>در یک موسسه آموزشی تعیین شده (DLI) ثبت نام کرده باشید.</li><li>اگر از خارج از کانادا می&zwnj;آیید تا به عنوان یک دانشجوی بین&zwnj;المللی تحصیل کنید، DLI شما باید در فهرست DLIهای دارای طرح آمادگی برای COVID-19، تأیید شده باشد.</li><li>ثابت کنید پول کافی برای پرداخت دارید:</li><li>شهریه تحصیل</li><li>هزینه&zwnj;های زندگی برای خود و اعضای خانواده که با شما به کانادا می&zwnj;آیند</li><li>هزینه&zwnj;های برگشت برای خود و اعضای خانواده که با شما به کانادا می&zwnj;آیند</li><li>رعایت قانون، نداشتن سابقه کیفری و دریافت گواهی پلیس (در صورت نیاز)</li><li>در سلامت کامل هستید و تحت معاینه پزشکی (در صورت نیاز) قرار می&zwnj;گیرید</li><li>به مامور مربوطه ثابت کنید که زمانی که مجوز تحصیل شما منقضی شود، کانادا را ترک خواهید کرد</li></ul>'
            ],
            [
                'title_en' => 'how to apply',
                'title_fa' => 'نحوه درخواست',
                'image' => 'images/info/1653126196.jpg',
                'body_en' => '<p>Generally, you must apply for a study permit before you come to Canada. Some people can apply for a study permit from within Canada. In some cases, you can apply when you arrive in Canada at the port of entry. Make sure you understand which option is available to you.</p><h3>Get your documents ready</h3><p>You need these documents to apply for a study permit:</p><ul><li>proof of acceptance (from a designated learning institution (DLI))</li><li>proof of identity, and</li><li>proof of financial support</li></ul><p>If you plan to study in Quebec, you must provide a valid certificat d\'acceptation du Québec or proof that you applied for one.</p><h3>Apply online</h3><p>If you\'re applying for a study permit, you should apply online, whether you\'re outside of Canada or already in Canada.</p><p>If you can\'t apply online because of a disability or because there\'s a problem with the online application, you can apply on paper.</p>',
                'body_fa' => '<p>به طور کلی، قبل از ورود به کانادا باید برای مجوز تحصیل اقدام کنید. برخی از افراد می توانند برای مجوز تحصیل از داخل کانادا اقدام کنند. در برخی موارد، هنگام ورود به کانادا می&zwnj;توانید درخواست دهید. مطمئن شوید که متوجه شده&zwnj;اید کدام گزینه در دسترس شماست.</p><h3>مدارک خود را آماده کنید</h3><p>برای درخواست مجوز تحصیل به این مدارک نیاز دارید:</p><ul><li>مدارک پذیرش (از یک موسسه آموزشی تعیین شده (DLI))</li><li>مدارک هویت،</li><li>مدارک حمایت مالی</li></ul><p>اگر قصد تحصیل در کبک را دارید، باید گواهی معتبر پذیرش کبک یا مدرکی مبنی بر درخواست خود ارائه دهید.</p><h3>درخواست آنلاین</h3><p>اگر برای مجوز تحصیل درخواست می&zwnj;کنید، باید به صورت آنلاین درخواست دهید، چه در خارج از کانادا باشید و چه در حال حاضر در کانادا. اگر به دلیل ناتوانی یا مشکلی در برنامه آنلاین نمی&lrm;توانید درخواست آنلاین بدهید، می توانید روی کاغذ درخواست دهید.</p>'
            ],
            [
                'title_en' => 'Work as a student',
                'title_fa' => 'کار دانشجویی',
                'image' => 'images/info/1653126203.jpg',
                'body_en' => '<h3>&nbsp;</h3><p>Work while you study, help your spouse or common-law partner get a work permit while you study, work temporarily or stay permanently in Canada after you graduate as an international student.</p><p>You can only start working in Canada when you start your study program. You can\'t work before your studies begin.</p><p>You can work as an international student in Canada if your study permit lists a condition that says you\'re allowed to work on- or off-campus.</p><p>Some study programs include work experience as part of their curriculum. You can apply for a co-op or intern work permit if you have some eligibility</p><p>After you graduate from your program of studies, you may be able to work temporarily or even live permanently in Canada. To work in Canada after you graduate, you need a work permit. The work experience you gain while working may help you qualify for permanent residence</p>',
                'body_fa' => '<h3>&nbsp;</h3><p>در حین تحصیل کار کنید، در حین تحصیل به همسر یا شریک زندگی خود کمک کنید تا مجوز کار دریافت کند، پس از فارغ التحصیلی به عنوان دانشجوی بین&zwnj;المللی، به طور موقت کار کنید یا به طور دائم در کانادا بمانید.</p><p>طور دائم در کانادا بمانید. شما تنها زمانی می توانید در کانادا شروع به کار کنید که برنامه تحصیلی خود را شروع کنید، قبل از شروع تحصیل نمی توانید کار کنید. اگر در مجوز تحصیلی شما شرایطی وجود داشته باشد که می&zwnj;گوید مجاز به کار در دانشگاه یا خارج از دانشگاه هستید، می&zwnj;توانید به عنوان یک دانشجوی بین&zwnj;المللی در کانادا کار کنید.</p><p>برخی از برنامه&zwnj;های تحصیلی شامل تجربه کاری به عنوان بخشی از برنامه درسی آنها می&zwnj;شود. اگر واجد شرایط هستید، می توانید برای مجوز کار تعاونی یا کارآموزی درخواست دهید.</p><p>پس از فارغ التحصیلی از برنامه تحصیلی خود، ممکن است بتوانید به طور موقت یا حتی به طور دائم در کانادا کار کنید. برای کار در کانادا پس از فارغ التحصیلی، به مجوز کار نیاز دارید. تجربه کاری که در حین کار به دست می&zwnj;آورید ممکن است به شما کمک کند تا واجد شرایط اقامت دائم شوید.</p>'
            ]
        ];

        foreach ($infos as $info) {
            Info::updateOrCreate(
                ['title_en' => $info['title_en']],
                $info
            );
        }
    }
}
