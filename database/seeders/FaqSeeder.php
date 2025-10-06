<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question_en' => 'Do I need a permit to study in Canada?',
                'question_fa' => 'آیا برای تحصیل در کانادا به مجوز نیاز دارم؟ ',
                'answer_en' => 'Most foreign nationals need a study permit to study in Canada. Some people in specific situations may not. You should apply for a study permit before coming to Canada. Only some people can apply for a study permit from within Canada. Before you apply, you must have a letter of acceptance from a designated learning institution in Canada. ',
                'answer_fa' => 'اکثر اتباع خارجی برای تحصیل در کانادا به مجوز تحصیل نیاز دارند. برخی از افراد در موقعیت های خاص ممکن است اینطور نباشند. قبل از ورود به کانادا باید برای مجوز تحصیل اقدام کنید. فقط برخی از افراد می توانند برای دریافت مجوز تحصیل از داخل کانادا اقدام کنند. قبل از درخواست ، باید نامه پذیرش از موسسه یادگیری تعیین شده در کانادا داشته باشید. '
            ],
            [
                'question_en' => 'When should I apply for my study permit?',
                'question_fa' => 'چه زمانی باید برای مجوز تحصیل خود اقدام کنم؟',
                'answer_en' => 'Apply as soon as you receive your letter of acceptance. The times needed to process your application may vary among visa offices. Check our application processing times for details. ',
                'answer_fa' => 'به محض دریافت نامه پذیرش ، درخواست دهید. زمان مورد نیاز برای پردازش درخواست شما ممکن است در بین دفاتر ویزا متفاوت باشد. برای جزئیات زمان پردازش برنامه ما را بررسی کنید. '
            ],
            [
                'question_en' => 'How do I apply for a study permit?',
                'question_fa' => 'چگونه می توانم برای مجوز تحصیل اقدام کنم؟',
                'answer_en' => 'You should apply for a study permit before coming to Canada. Make sure you have a letter of acceptance from a designated learning institution in Canada before you apply. You should apply online for a study permit, whether you\'re outside of Canada or already in Canada. If you can\'t apply online because of a disability or because there\'s a problem with the online application, you can apply on paper. If you\'re currently a visitor in Canada Find out how you can apply for a study permit if you\'re already in Canada as a visitor. ',
                'answer_fa' => 'قبل از ورود به کانادا باید برای مجوز تحصیل اقدام کنید. قبل از درخواست ، از پذیرش یک موسسه آموزشی مشخص در کانادا اطمینان حاصل کنید. شما باید بصورت آنلاین برای مجوز تحصیل اقدام کنید ، چه خارج از کانادا باشید و چه در حال حاضر در کانادا هستید. اگر به دلیل ناتوانی یا مشکلی در برنامه آنلاین نمی توانید آنلاین درخواست دهید ، می توانید روی کاغذ درخواست دهید. اگر در حال حاضر یک بازدید کننده در کانادا هستید اگر در حال حاضر به عنوان یک بازدید کننده در کانادا هستید ، چگونه می توانید برای مجوز تحصیل اقدام کنید. '
            ],
            [
                'question_en' => 'What does it mean to have legal status in Canada? ',
                'question_fa' => 'داشتن حقوقی در کانادا به چه معناست؟ ',
                'answer_en' => 'Having legal status means you are authorized to enter and remain in Canada as a temporary or permanent resident under the Immigration and Refugee Protection Act, as a Canadian citizen under the Citizenship Act or as a Registered Indian under the Indian Act. Temporary resident status is valid for a specific period of time and you must ensure that your status as a temporary resident remains valid while you are in Canada. ',
                'answer_fa' => 'داشتن وضعیت قانونی به این معنی است که شما مجاز به ورود و ماندن در کانادا به عنوان اقامت موقت یا دائم تحت قانون مهاجرت و حمایت از پناهندگان ، به عنوان یک شهروند کانادایی تحت قانون شهروندی یا به عنوان یک هندی ثبت شده تحت قانون هند هستید. وضعیت اقامت موقت برای یک دوره زمانی خاص معتبر است و شما باید اطمینان حاصل کنید که وضعیت شما به عنوان یک اقامت موقت تا زمانی که در کانادا هستید همچنان معتبر است. '
            ],
            [
                'question_en' => 'I am an international student in Canada. Can I work while studying? ',
                'question_fa' => 'من دانشجوی بین المللی در کانادا هستم. آیا می توانم هنگام تحصیل کار کنم؟ ',
                'answer_en' => 'You may be eligible to work in Canada while studying, if your study permit includes a condition that says you can work on or off campus. You must also meet all the other requirements. You can only start working in Canada when you start your study program. You can\'t work before your studies begin. ',
                'answer_fa' => 'اگر مجوز تحصیل شما شامل شرایطی باشد که می گوید می توانید در دانشگاه یا خارج از آن کار کنید ، ممکن است هنگام تحصیل در کانادا واجد شرایط باشید. شما همچنین باید تمام شرایط دیگر را برآورده کنید. تنها با شروع برنامه تحصیلی خود می توانید در کانادا شروع به کار کنید. شما نمی توانید قبل از شروع تحصیل کار کنید. '
            ],
            [
                'question_en' => 'As a foreign student, can I return home or travel outside Canada while studying?',
                'question_fa' => 'آیا به عنوان یک دانشجوی خارجی می توانم هنگام تحصیل به خانه برگردم یا به خارج از کانادا سفر کنم؟',
                'answer_en' => 'Yes. However, your study permit is not a travel document. It doesn\'t give you the right to travel to or enter Canada. Along with your permit, you may need: a visitor visa (temporary resident visa) or an Electronic Travel Authorization (eTA) Depending on where you\'re from, you may only need your passport. Make sure you know which document you need to travel to and enter Canada. ',
                'answer_fa' => 'آره. با این حال ، مجوز تحصیل شما یک سند سفر نیست. این حق سفر یا ورود به کانادا را به شما نمی دهد. همراه با مجوز ، ممکن است به موارد زیر نیاز داشته باشید: ویزای بازدید کننده (ویزای اقامت موقت) یا مجوز سفر الکترونیکی (eTA) بسته به اینکه از کجا هستید ، ممکن است فقط به گذرنامه خود احتیاج داشته باشید. اطمینان حاصل کنید که برای سفر و ورود به کانادا به کدام سند نیاز دارید. '
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question_en' => $faq['question_en']],
                $faq
            );
        }
    }
}
