function initializeTrainingChat() {
    const chat = document.querySelector('[data-training-chat]');
    if (!chat || chat.dataset.chatReady) return;
    chat.dataset.chatReady = 'true';

    const toggle = chat.querySelector('[data-chat-toggle]');
    const close = chat.querySelector('[data-chat-close]');
    const panel = chat.querySelector('[data-chat-panel]');
    const form = chat.querySelector('[data-chat-form]');
    const input = form.querySelector('input[name="question"]');
    const submit = form.querySelector('button[type="submit"]');
    const messages = chat.querySelector('[data-chat-messages]');

    function setOpen(open) {
        panel.hidden = !open;
        toggle.setAttribute('aria-expanded', String(open));
        if (open) input.focus();
    }

    function addMessage(text, role, source = null) {
        const bubble = document.createElement('div');
        bubble.className = `training-chat-message is-${role}`;
        bubble.textContent = text;
        if (source) {
            const citation = document.createElement('small');
            citation.textContent = `المصدر: رسالة التدريب ${source.message_id}، ${source.date}`;
            bubble.appendChild(citation);
        }
        messages.appendChild(bubble);
        messages.scrollTop = messages.scrollHeight;
    }

    async function ask(question) {
        addMessage(question, 'user');
        input.value = '';
        submit.disabled = true;
        const pending = document.createElement('div');
        pending.className = 'training-chat-message is-assistant';
        pending.textContent = 'أبحث في المعلومات المعتمدة...';
        messages.appendChild(pending);
        messages.scrollTop = messages.scrollHeight;

        try {
            const response = await fetch(chat.dataset.endpoint, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                },
                body: JSON.stringify({ question }),
            });
            if (!response.ok) throw new Error('request failed');
            const data = await response.json();
            pending.remove();
            if (data.answers.length) {
                data.answers.forEach((answer) => addMessage(answer.answer, 'assistant', answer.source));
            } else {
                addMessage(data.fallback, 'assistant');
            }
        } catch {
            pending.remove();
            addMessage('تعذر الحصول على إجابة الآن. حاول مرة أخرى لاحقاً.', 'assistant');
        } finally {
            submit.disabled = false;
            input.focus();
        }
    }

    toggle.addEventListener('click', () => setOpen(panel.hidden));
    close.addEventListener('click', () => setOpen(false));
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const question = input.value.trim();
        if (question.length >= 3 && !submit.disabled) ask(question);
    });
    chat.querySelectorAll('[data-chat-suggestion]').forEach((button) => {
        button.addEventListener('click', () => {
            setOpen(true);
            if (!submit.disabled) ask(button.dataset.chatSuggestion);
        });
    });
}

document.addEventListener('DOMContentLoaded', initializeTrainingChat);
document.addEventListener('livewire:navigated', initializeTrainingChat);
