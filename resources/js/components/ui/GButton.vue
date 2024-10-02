<script setup lang="ts">
import { cva } from 'class-variance-authority';
import { computed, useSlots } from 'vue';

type ButtonIntent = 'primary' | 'secondary' | 'danger' | 'text' | 'transparent';

type ButtonRounded = 'default' | 'none' | 'full';

type ButtonType = 'button' | 'submit' | 'reset';


const props = withDefaults(
    defineProps<{
        intent?: ButtonIntent;
        type?: ButtonType;
        as?: string | Object;
        rounded?: ButtonRounded;
    }>(),
    {
        intent: 'primary',
        type: 'button',
        as: 'button',
        rounded: 'default',
    },
);

const buttonClass = computed(() => {
  return cva(
    'block rounded-md bg-indigo-600 py-1.5 px-3 text-center text-sm font-semibold text-white shadow-sm leading-6',
    {
      variants: {
        intent: {
          primary:
          'bg-indigo-600 text-white shadow-sm hover:bg-indigo-500 ',
          secondary:
            'bg-black/10 text-gray-700 hover:bg-black/5 active:bg-black/10',
          danger: 'bg-red-600  text-white hover:bg-red-500 ',
          text: 'text-primary hover:bg-primary/5 active:bg-primary/10',
          transparent: 'text-gray-600 hover:bg-gray-100',
        },
        rounded: {
          default: 'rounded',
          none: '',
          full: 'rounded-full',
        },
      },
    },
  )({
    intent: props.intent,
    rounded: props.rounded,
  });
});

const slots = useSlots();

</script>

<template>
    <component :is="props.as" :class="buttonClass" :type="props.type">
      <slot />
    </component>
</template>
