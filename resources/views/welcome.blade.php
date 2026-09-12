@php
    $opportunities = [
        ['department' => 'الإدارة التنفيذية للتحول الرقمي', 'title' => 'المعلوماتية الصحية', 'description' => 'تجربة تطبيقية تربط المعرفة التقنية بتحسين رحلة المريض وجودة الخدمات الصحية.', 'duration' => '6 أشهر', 'location' => 'الرياض'],
        ['department' => 'إدارة الموارد البشرية', 'title' => 'إدارة رأس المال البشري', 'description' => 'تعرّف على عمليات استقطاب الكفاءات وتطويرها ودعم تجربة الموظف في بيئة صحية متخصصة.', 'duration' => '4 أشهر', 'location' => 'الرياض'],
        ['department' => 'إدارة المالية', 'title' => 'المحاسبة والمالية', 'description' => 'طبّق المهارات المالية والمحاسبية ضمن منظومة عمل مؤسسية عالية الكفاءة.', 'duration' => '6 أشهر', 'location' => 'الرياض'],
    ];

    $steps = [
        ['number' => '01', 'title' => 'أنشئ ملفك', 'text' => 'أكمل بياناتك الأكاديمية وأرفق المستندات المطلوبة.'],
        ['number' => '02', 'title' => 'اختر الفرصة', 'text' => 'استعرض الفرص المتوافقة مع تخصصك وخطتك الدراسية.'],
        ['number' => '03', 'title' => 'تابع طلبك', 'text' => 'تابع حالة الطلب والإشعارات من لوحة تحكم واحدة.'],
    ];
@endphp

<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        @include('partials.head', ['title' => 'التدريب التعاوني'])
        <meta name="description" content="بوابة التدريب التعاوني في مدينة الملك فهد الطبية">
    </head>
    <body class="prototype-home">
        <a class="skip-link" href="#main-content">انتقل إلى المحتوى</a>

        <header class="site-header">
            <div class="page-shell header-inner">
                <a href="{{ route('home') }}" class="brand" aria-label="الصفحة الرئيسية">
                    <img class="brand-logo" src="{{ asset('images/kfmc-logo.png') }}" alt="مدينة الملك فهد الطبية">
                    <span class="brand-divider" aria-hidden="true"></span>
                    <span class="brand-copy"><strong>بوابة التدريب التعاوني</strong><small>خطوة نحو المستقبل</small></span>
                </a>
                <nav class="desktop-nav" aria-label="التنقل الرئيسي">
                    <a class="is-active" href="#main-content">الرئيسية</a>
                    <a href="#about">عن التدريب</a>
                    <a href="#opportunities">الفرص التدريبية</a>
                    <a href="#journey">رحلة المتدرب</a>
                    <a href="#faq">الأسئلة الشائعة</a>
                </nav>
                @if (Route::has('login'))
                    <a class="button button-outline header-login" href="{{ route('login') }}">تسجيل الدخول <span aria-hidden="true">←</span></a>
                @endif
                <details class="mobile-menu">
                    <summary aria-label="فتح قائمة التنقل"><span></span><span></span><span></span></summary>
                    <nav aria-label="التنقل للجوال">
                        <a href="#main-content">الرئيسية</a><a href="#about">عن التدريب</a><a href="#opportunities">الفرص التدريبية</a><a href="#journey">رحلة المتدرب</a>
                        @if (Route::has('login'))<a href="{{ route('login') }}">تسجيل الدخول</a>@endif
                    </nav>
                </details>
            </div>
        </header>

        <main id="main-content">
            <section class="hero" aria-labelledby="hero-title">
                <div class="hero-accent hero-accent-one" aria-hidden="true"></div><div class="hero-accent hero-accent-two" aria-hidden="true"></div>
                <div class="page-shell hero-grid">
                    <div class="hero-copy">
                        <span class="eyebrow"><i></i> بوابة التدريب التعاوني</span>
                        <h1 id="hero-title">خطوتك الأولى نحو<br><em>أثرٍ صحي مستدام</em></h1>
                        <p>ابدأ تجربتك المهنية في بيئة صحية متقدمة، وطوّر مهاراتك العملية مع خبراء مدينة الملك فهد الطبية.</p>
                        <div class="hero-actions">
                            <a class="button button-primary" href="#opportunities">استعرض الفرص التدريبية <span aria-hidden="true">←</span></a>
                            <a class="text-link" href="#about">تعرّف على البرنامج <span aria-hidden="true">↓</span></a>
                        </div>
                        <div class="hero-note"><span class="note-icon" aria-hidden="true">✓</span><p><strong>رحلة رقمية موحّدة</strong><small>من إنشاء الطلب وحتى إتمام التدريب</small></p></div>
                    </div>

                    <div class="hero-visual" aria-label="نظرة أولية على رحلة التقديم">
                        <div class="visual-kicker">رحلتك في مكان واحد</div>
                        <div class="journey-card">
                            <div class="journey-card-head">
                                <div><small>حالة الطلب</small><strong>طلب تدريب تعاوني</strong></div>
                                <span class="status-pill">قيد المراجعة</span>
                            </div>
                            <div class="progress-track" aria-label="نسبة اكتمال الطلب 75%"><span></span></div>
                            <ol class="mini-timeline">
                                <li class="is-done"><i>✓</i><span><strong>اكتمال الملف الشخصي</strong><small>تم التحقق من البيانات</small></span></li>
                                <li class="is-done"><i>✓</i><span><strong>اختيار الفرصة</strong><small>المعلوماتية الصحية</small></span></li>
                                <li class="is-current"><i>3</i><span><strong>مراجعة الطلب</strong><small>فريق التدريب يراجع طلبك</small></span></li>
                                <li><i>4</i><span><strong>القرار النهائي</strong><small>سيصلك إشعار فور التحديث</small></span></li>
                            </ol>
                        </div>
                        <div class="floating-card floating-card-top"><span aria-hidden="true">✦</span><p><strong>فرص نوعية</strong><small>في تخصصات متعددة</small></p></div>
                        <div class="floating-card floating-card-bottom"><strong>ملف واحد</strong><small>لكامل رحلة التدريب</small></div>
                    </div>
                </div>
            </section>

            <section class="trust-strip" aria-label="مزايا المنصة">
                <div class="page-shell trust-grid">
                    <div><b>01</b><span><strong>تقديم إلكتروني</strong><small>خطوات واضحة ومبسطة</small></span></div>
                    <div><b>02</b><span><strong>متابعة مباشرة</strong><small>حالة طلبك أولًا بأول</small></span></div>
                    <div><b>03</b><span><strong>فرص متخصصة</strong><small>تجربة داخل بيئة صحية</small></span></div>
                    <div><b>04</b><span><strong>تجربة متكاملة</strong><small>من التقديم حتى التقييم</small></span></div>
                </div>
            </section>

            <section class="section about-section" id="about">
                <div class="page-shell about-grid">
                    <div><span class="section-label">عن البرنامج</span><h2>نحو جيل مهني يصنع الفرق في القطاع الصحي</h2></div>
                    <div class="about-copy"><p>يتيح برنامج التدريب التعاوني للطلاب والطالبات تطبيق معارفهم الأكاديمية، واكتساب خبرة مهنية حقيقية ضمن قطاعات مدينة الملك فهد الطبية.</p><a class="text-link dark" href="#journey">اكتشف رحلة المتدرب <span aria-hidden="true">←</span></a></div>
                </div>
            </section>

            <section class="section journey-section" id="journey">
                <div class="page-shell">
                    <div class="section-heading centered"><span class="section-label">رحلة سهلة وواضحة</span><h2>من التقديم إلى بداية التجربة</h2><p>ثلاث خطوات أساسية تساعدك على البدء بثقة.</p></div>
                    <div class="steps-grid">
                        @foreach ($steps as $step)
                            <article class="step-card"><span class="step-number">{{ $step['number'] }}</span><h3>{{ $step['title'] }}</h3><p>{{ $step['text'] }}</p></article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section opportunities-section" id="opportunities">
                <div class="page-shell">
                    <div class="section-heading opportunities-heading">
                        <div><span class="section-label">فرص مختارة</span><h2>ابدأ من التخصص الأقرب إليك</h2></div>
                        <a class="button button-outline" href="#">عرض جميع الفرص <span aria-hidden="true">←</span></a>
                    </div>
                    <div class="opportunity-grid">
                        @foreach ($opportunities as $opportunity)
                            <article class="opportunity-card">
                                <div class="opportunity-meta"><span class="status-dot"><i></i>متاح للتقديم</span><span>{{ $opportunity['department'] }}</span></div>
                                <h3>{{ $opportunity['title'] }}</h3><p>{{ $opportunity['description'] }}</p>
                                <dl><div><dt>المدة</dt><dd>{{ $opportunity['duration'] }}</dd></div><div><dt>المقر</dt><dd>{{ $opportunity['location'] }}</dd></div></dl>
                                <a href="#" aria-label="عرض تفاصيل فرصة {{ $opportunity['title'] }}">تفاصيل الفرصة <span aria-hidden="true">←</span></a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section cta-section" id="faq">
                <div class="page-shell"><div class="cta-panel"><span class="cta-number" aria-hidden="true">01</span><div><span class="section-label light">جاهز للانطلاق؟</span><h2>ابنِ خبرتك المهنية من هنا</h2><p>أنشئ حسابك، جهّز ملفك، واختر الفرصة التي تناسب مسارك الأكاديمي.</p></div>@if (Route::has('register'))<a class="button button-gold" href="{{ route('register') }}">إنشاء حساب جديد <span aria-hidden="true">←</span></a>@endif</div></div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="page-shell footer-main">
                <div class="brand footer-brand"><img class="brand-logo" src="{{ asset('images/kfmc-logo.png') }}" alt="مدينة الملك فهد الطبية"><span class="brand-divider" aria-hidden="true"></span><span class="brand-copy"><strong>بوابة التدريب التعاوني</strong><small>خطوة نحو المستقبل</small></span></div>
                <p>بوابة رقمية لإدارة رحلة التدريب التعاوني من البداية إلى النهاية.</p>
                <nav aria-label="روابط التذييل"><a href="#about">عن التدريب</a><a href="#opportunities">الفرص التدريبية</a><a href="#faq">الدعم والمساعدة</a></nav>
            </div>
            <div class="page-shell footer-bottom"><span>© {{ date('Y') }} مدينة الملك فهد الطبية</span><span>نموذج أولي للواجهة</span></div>
        </footer>
        @fluxScripts
    </body>
</html>
