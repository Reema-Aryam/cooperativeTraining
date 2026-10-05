<?php

namespace Database\Seeders;

use App\Models\ChatbotKnowledge;
use Illuminate\Database\Seeder;

class ChatbotKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $facts = [
            [
                'slug' => 'supervisors',
                'category' => 'المشرفون',
                'question' => 'أين أجد بيانات مشرفي التدريب؟',
                'answer' => 'تُرسل بيانات المشرف الميداني والمشرف المباشر لكل متدرب عبر البريد الإلكتروني مع خطاب القبول. راجع رسالة القبول الخاصة بك للحصول على الأسماء وبيانات التواصل الصحيحة؛ فقد تختلف من متدرب لآخر.',
                'triggers' => ['المشرف', 'المشرفين', 'مشرفي التدريب', 'اسم المشرف', 'بيانات المشرف', 'ايميل المشرف', 'المشرف المباشر', 'المشرف الميداني', 'supervisor'],
                'source_file' => 'messages17.html',
                'source_message_id' => 'message17226',
                'source_date' => '2026-05-18',
            ],
            [
                'slug' => 'training_location',
                'category' => 'الموقع',
                'question' => 'أين يقع مقر التدريب؟',
                'answer' => 'لم أجد عنواناً موحداً ومؤكداً لمقر تدريب جميع المتدربين في الرسائل المعتمدة. لمعرفة موقع مباشرتك، راجع خطاب القبول وخطة التدريب المرسلين إليك، أو تواصل مع مشرفك المباشر.',
                'triggers' => ['عنوان التدريب', 'عنوان المقر', 'مكان التدريب', 'موقع التدريب', 'مقر التدريب', 'وين التدريب', 'location', 'address'],
                'source_file' => null,
                'source_message_id' => null,
                'source_date' => null,
            ],
            [
                'slug' => 'project_evaluation_supervisor',
                'category' => 'المشرفون',
                'question' => 'من المشرفة على تقييم المشروع الأول؟',
                'answer' => 'ذكرت رسالة بتاريخ 9 يوليو 2026 أن مريم الحربي مشرفة على تقييم المشروع الأول في قسم التدريب الإداري والمهني. تحقق من تعليمات مجموعتك إذا كنت تسأل عن دورة أخرى.',
                'triggers' => ['مشرفة تقييم المشروع', 'المشرف على تقييم المشروع', 'تقييم المشروع الاول', 'مريم الحربي'],
                'source_file' => 'messages17.html',
                'source_message_id' => 'message17350',
                'source_date' => '2026-07-09',
            ],
            [
                'slug' => 'training_topics',
                'category' => 'المواضيع',
                'question' => 'ما مواضيع التدريب؟',
                'answer' => 'ورد في خطة التدريب المنشورة لمسار تقنية المعلومات التركيز على تطوير قواعد البيانات وتطبيقات الويب. التفاصيل المحددة لمجموعتك موجودة في خطة التدريب المرفقة بخطاب القبول.',
                'triggers' => ['مواضيع التدريب', 'موضوع التدريب', 'ماذا نتعلم', 'ماذا سندرس', 'مسار التدريب', 'خطة التدريب', 'محتوى التدريب', 'training topics', 'training track'],
                'source_file' => 'messages15.html',
                'source_message_id' => 'message14593',
                'source_date' => '2025-06-15',
            ],
            [
                'slug' => 'training_period',
                'category' => 'الفترة',
                'question' => 'متى يبدأ التدريب وما مدته؟',
                'answer' => 'يبدأ تدريبك في التاريخ المحدد في خطاب قبولك. راجع الخطاب وخطة التدريب لمعرفة فترة تدريبك ومدتها؛ لا يوجد تاريخ بداية أو مدة واحدة تنطبق على جميع المتدربين.',
                'triggers' => ['فترة التدريب', 'مدة التدريب', 'بداية التدريب', 'تاريخ التدريب', 'متى يبدأ التدريب', 'متى ابدا', 'كم شهر', 'كم مدة', 'training period', 'start date'],
                'source_file' => 'messages15.html',
                'source_message_id' => 'message14593',
                'source_date' => '2025-06-15',
            ],
            [
                'slug' => 'projects',
                'category' => 'المشاريع',
                'question' => 'ما المشاريع في التدريب؟',
                'answer' => 'تذكر تعليمات إحدى مجموعات التدريب مشروعاً أول باسم ADO ومشروعاً ثانياً باسم MVC، مع نسخة من المشروع وقاعدة البيانات. تختلف المشاريع المطلوبة ومعاييرها بحسب المجموعة والفترة؛ اعتمد خطة مجموعتك وتعليمات مشرفك لتحديد المطلوب منك.',
                'triggers' => ['المشاريع', 'مشاريع التدريب', 'مشروع التدريب', 'المشروع الاول', 'المشروع الثاني', 'المشروع الثالث', 'مشروع mvc', 'ado', 'asp.net', 'projects'],
                'source_file' => 'messages16.html',
                'source_message_id' => 'message15458',
                'source_date' => '2025-10-26',
            ],
        ];

        foreach ($facts as $fact) {
            ChatbotKnowledge::query()->firstOrCreate(
                ['slug' => $fact['slug']],
                $fact + ['is_active' => true],
            );
        }
    }
}
