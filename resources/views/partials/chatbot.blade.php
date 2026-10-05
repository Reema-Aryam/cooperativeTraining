<aside class="training-chat" data-training-chat data-endpoint="{{ route('chatbot.ask') }}" aria-label="مساعد التدريب التعاوني">
    <button class="training-chat-toggle" type="button" data-chat-toggle aria-expanded="false" aria-controls="training-chat-panel">
        <span aria-hidden="true">✦</span> اسأل عن التدريب
    </button>
    <section class="training-chat-panel" id="training-chat-panel" data-chat-panel hidden>
        <header class="training-chat-header">
            <div><strong>مساعد التدريب</strong><small>إجابات موثقة عن المعلومات الأساسية</small></div>
            <button type="button" data-chat-close aria-label="إغلاق المحادثة">×</button>
        </header>
        <div class="training-chat-messages" data-chat-messages role="log" aria-live="polite">
            <div class="training-chat-message is-assistant">مرحباً! يمكنني مساعدتك في بيانات المشرفين، موقع التدريب، المواضيع، الفترة، والمشاريع. لا أطلع على خطاب قبولك الشخصي.</div>
        </div>
        <div class="training-chat-suggestions" aria-label="أسئلة مقترحة">
            <button type="button" data-chat-suggestion="أين أجد بيانات المشرفين؟">بيانات المشرفين</button>
            <button type="button" data-chat-suggestion="أين يقع مقر التدريب؟">موقع التدريب</button>
            <button type="button" data-chat-suggestion="ما مواضيع التدريب؟">مواضيع التدريب</button>
            <button type="button" data-chat-suggestion="متى يبدأ التدريب وما مدته؟">فترة التدريب</button>
            <button type="button" data-chat-suggestion="ما المشاريع في التدريب؟">المشاريع</button>
        </div>
        <form class="training-chat-form" data-chat-form>
            @csrf
            <label class="sr-only" for="training-chat-question">سؤالك عن التدريب</label>
            <input id="training-chat-question" name="question" type="text" placeholder="اكتب سؤالك هنا..." minlength="3" maxlength="500" autocomplete="off">
            <button type="submit">إرسال</button>
        </form>
        <p class="training-chat-note">البيانات الشخصية والمواعيد الخاصة بك تؤخذ من خطاب القبول.</p>
    </section>
</aside>
