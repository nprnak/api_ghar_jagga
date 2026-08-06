<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed, ref, watch } from 'vue';

const page = usePage();
const visible = ref(false);

const success = computed(() => page.props.flash?.success);
const error = computed(() => page.props.flash?.error);

watch(
    [success, error],
    ([s, e]) => {
        visible.value = Boolean(s || e);
        if (visible.value) {
            window.setTimeout(() => {
                visible.value = false;
            }, 5000);
        }
    },
    { immediate: true },
);
</script>

<template>
    <Transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="translate-y-4 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="visible && (success || error)"
            class="fixed right-4 bottom-4 z-[80] max-w-md rounded-sm border px-5 py-4 shadow-lg"
            :class="
                success
                    ? 'border-accent-green/30 bg-white text-ink'
                    : 'border-red-200 bg-white text-ink'
            "
            role="status"
        >
            <p class="text-sm leading-relaxed">
                <span
                    class="mr-2 font-semibold"
                    :class="success ? 'text-accent-green' : 'text-red-600'"
                >
                    {{ success ? 'Success' : 'Error' }}
                </span>
                {{ success || error }}
            </p>
        </div>
    </Transition>
</template>
