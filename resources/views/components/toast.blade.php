@php
    $initialToast = session('notify') ?? session('toast') ?? session('status');
@endphp

<div
    x-data="{
        show: false,
        message: @js($initialToast ?? ''),
        title: 'Sucesso',
        type: 'success',
        duration: 2500,
        progress: 100,
        timer: null,
        interval: null,

        start() {
            this.progress = 100

            clearInterval(this.interval)
            clearTimeout(this.timer)

            this.interval = setInterval(() => {
                this.progress -= 100 / (this.duration / 100)
            }, 100)

            this.timer = setTimeout(() => this.hide(), this.duration)
        },

        hide() {
            this.show = false
            clearTimeout(this.timer)
            clearInterval(this.interval)
        },

        setPayload(detail) {
            if (typeof detail === 'string') {
                this.message = detail;
                this.type = 'success';
                this.title = 'Sucesso';
                this.duration = 2500;
                return;
            }

            this.message = detail?.message ?? '';
            this.type = detail?.type ?? 'success';
            this.title = detail?.title ?? (
                this.type === 'error' ? 'Erro' :
                this.type === 'warning' ? 'Atenção' :
                this.type === 'info' ? 'Informação' :
                'Sucesso'
            );
            this.duration = detail?.duration ?? 2500;
        }
    }"
    x-init="
        if (message) {
            show = true;
            start();
        }
    "

    x-on:notify.window="
        setPayload($event.detail);
        show = true;
        start();
    "

    x-show="show"
    x-cloak

    x-transition:enter="transition transform ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition transform ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 translate-y-2 scale-95"

    @mouseenter="clearTimeout(timer); clearInterval(interval)"
    @mouseleave="start()"

    @keydown.escape.window="hide()"
    role="status"
    aria-live="polite"

    class="fixed top-5 right-5 z-50 w-[22rem] overflow-hidden rounded-2xl border bg-white shadow-2xl"
    :class="
        type === 'error' ? 'border-rose-200' :
        type === 'warning' ? 'border-amber-200' :
        type === 'info' ? 'border-sky-200' :
        'border-emerald-200'
    "
>
    <div class="flex items-start gap-3 p-4">
        <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full"
            :class="
                type === 'error' ? 'bg-rose-100 text-rose-600' :
                type === 'warning' ? 'bg-amber-100 text-amber-600' :
                type === 'info' ? 'bg-sky-100 text-sky-600' :
                'bg-emerald-100 text-emerald-600'
            ">
            <svg x-show="type === 'success'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.704 5.29a1 1 0 010 1.42l-7.25 7.25a1 1 0 01-1.415 0l-3-3a1 1 0 111.414-1.42l2.293 2.294 6.543-6.544a1 1 0 011.415 0z" clip-rule="evenodd" />
            </svg>

            <svg x-show="type === 'error'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414-1.414L10 8.586 7.707 6.293a1 1 0 00-1.414 1.414L8.586 10l-2.293 2.293a1 1 0 101.414 1.414L10 11.414l2.293 2.293a1 1 0 001.414-1.414L11.414 10l2.293-2.293z" clip-rule="evenodd" />
            </svg>

            <svg x-show="type === 'warning'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.721-1.36 3.486 0l6.347 11.288c.75 1.334-.213 2.99-1.742 2.99H3.652c-1.53 0-2.492-1.656-1.743-2.99L8.257 3.1zM11 13a1 1 0 10-2 0 1 1 0 002 0zm-1-7a1 1 0 00-1 1v4a1 1 0 102 0V7a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>

            <svg x-show="type === 'info'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10A8 8 0 112 10a8 8 0 0116 0zm-7-4a1 1 0 10-2 0 1 1 0 002 0zm-1 3a1 1 0 00-1 1v4a1 1 0 102 0v-4a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
        </div>

        <div class="min-w-0 flex-1">
            <p class="text-sm font-semibold text-slate-800" x-text="title"></p>
            <p class="mt-0.5 text-sm text-slate-600 break-words" x-text="message"></p>
        </div>

        <button type="button" @click="hide()"
            class="rounded-md p-1.5 text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition"
            aria-label="Fechar notificação">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div class="h-1 bg-slate-100">
        <div
            class="h-full transition-all"
            :class="
                type === 'error' ? 'bg-rose-500' :
                type === 'warning' ? 'bg-amber-500' :
                type === 'info' ? 'bg-sky-500' :
                'bg-emerald-500'
            "
            :style="`width: ${progress}%`"
        ></div>
    </div>
</div>
