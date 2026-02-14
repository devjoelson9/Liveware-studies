<div
    x-data="{
        show: false,
        message: '',
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
        }
    }"

    x-on:notify.window="
        message = $event.detail.message ?? $event.detail;
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

    class="fixed top-5 right-5 w-80 bg-green-500 text-white rounded-2xl shadow-2xl z-50 overflow-hidden"
>
    <div class="px-5 py-4 font-semibold">
        <span x-text="message"></span>
    </div>

    <div class="h-1 bg-green-800/40">
        <div
            class="h-full bg-white transition-all"
            :style="`width: ${progress}%`"
        ></div>
    </div>
</div>
