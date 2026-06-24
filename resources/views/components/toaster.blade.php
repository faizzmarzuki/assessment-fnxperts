@php
    // Collect server-side flash messages so they render as toasts on load.
    $initialToasts = [];

    if (session('success')) {
        $initialToasts[] = ['type' => 'success', 'message' => session('success')];
    }
    if (session('error')) {
        $initialToasts[] = ['type' => 'error', 'message' => session('error')];
    }
@endphp

<div
    x-data="toaster(@js($initialToasts))"
    @toast.window="add($event.detail)"
    class="fixed z-50 flex flex-col gap-2.5 pointer-events-none bottom-4 right-4 left-4 sm:left-auto sm:w-full sm:max-w-sm"
    aria-live="polite"
    aria-atomic="true"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="toast.visible"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-6 opacity-0 sm:scale-95"
            x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-y-0 opacity-100"
            x-transition:leave-end="translate-y-2 opacity-0"
            class="flex items-start gap-3 px-4 py-3 bg-white border border-gray-200 rounded-lg shadow-lg pointer-events-auto"
            :class="{
                'border-l-4 border-l-green-500': toast.type === 'success',
                'border-l-4 border-l-red-500': toast.type === 'error',
                'border-l-4 border-l-blue-500': toast.type === 'info',
            }"
            role="status"
        >
            {{-- Icon --}}
            <div class="mt-0.5 shrink-0">
                <template x-if="toast.type === 'success'">
                    <svg class="w-5 h-5 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </template>
                <template x-if="toast.type === 'error'">
                    <svg class="w-5 h-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                    </svg>
                </template>
                <template x-if="toast.type === 'info'">
                    <svg class="w-5 h-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                    </svg>
                </template>
            </div>

            {{-- Message --}}
            <p class="flex-1 text-sm font-medium text-gray-800" x-text="toast.message"></p>

            {{-- Dismiss --}}
            <button
                type="button"
                @click="dismiss(toast.id)"
                class="mt-0.5 text-gray-400 transition shrink-0 hover:text-gray-600 focus:outline-none"
                aria-label="Dismiss notification"
            >
                <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                </svg>
            </button>
        </div>
    </template>
</div>

@once
    <script>
        function toaster(initial = []) {
            return {
                toasts: [],
                counter: 0,

                init() {
                    initial.forEach((t) => this.add(t));
                },

                add(toast) {
                    const id = ++this.counter;
                    this.toasts.push({
                        id,
                        type: toast.type || 'info',
                        message: toast.message || '',
                        visible: false,
                    });

                    // Reveal on the next tick so the enter transition runs.
                    this.$nextTick(() => {
                        const item = this.toasts.find((t) => t.id === id);
                        if (item) item.visible = true;
                    });

                    const duration = toast.duration ?? 4000;
                    if (duration > 0) {
                        setTimeout(() => this.dismiss(id), duration);
                    }
                },

                dismiss(id) {
                    const item = this.toasts.find((t) => t.id === id);
                    if (!item) return;
                    item.visible = false;
                    // Remove from the DOM after the leave transition finishes.
                    setTimeout(() => {
                        this.toasts = this.toasts.filter((t) => t.id !== id);
                    }, 250);
                },
            };
        }

        // Global helper: window.toast('Saved!', 'success')
        window.toast = function (message, type = 'success', options = {}) {
            window.dispatchEvent(
                new CustomEvent('toast', { detail: { message, type, ...options } })
            );
        };
    </script>
@endonce
