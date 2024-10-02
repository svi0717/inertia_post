<template>
    <form @submit.prevent="submitForm">
        <div>
            <strong>
                <h1 class="mt-10">
                게시판 등록
                </h1>
            </strong>
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
              <label for="title" class="block text-sm font-medium leading-6 text-gray-900">제목</label>
              <div class="mt-2">
                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                  <input type="text" v-model="form.title" id="title" autocomplete="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="제목을 입력하세요" required />
                </div>
              </div>
            </div>
            <div class="col-span-full">
              <label for="content" class="block text-sm font-medium leading-6 text-gray-900">내용</label>
              <div class="mt-2">
                <textarea v-model="form.content" id="content" rows="12" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required />
              </div>
            </div>
          </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-2">
            <GButton intent="primary" @click="cancel">목록</GButton>
            <GButton intent="primary" type="submit">등록
            </GButton>
        </div>
    </form>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import GButton from '@/components/ui/GButton.vue';

const form = useForm({
    title: '',
    content: ''
});

function cancel() {
  window.history.back();
}

function submitForm() {
    form.post('/store',{
        preserveScroll: true,
        onSuccess: () => {
           alert('게시물이 성공적으로 등록 되었습니다!')
        },
    });
}
</script>
