<template>
    <form @submit.prevent="submitForm">
        <div>
            <strong>
                <h1 class="mt-10">
                    게시판 조회
                </h1>
            </strong>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">제목</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <input type="text" v-model="form.title" id="title" autocomplete="title"
                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                readonly />
                        </div>
                    </div>
                    <label class="mt-2 block text-sm font-medium leading-6 text-gray-900">
                        작성자: {{ posts.users.name }}
                    </label>
                </div>

                <div class="col-span-full">
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">내용</label>
                    <div class="mt-2">
                        <textarea v-model="form.content" id="content" rows="12"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            readonly />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-2">

            <Link href="/posts" type="button" class="inline-flex  justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                focus-visible:outline-indigo-600">목록</Link>
            <div v-if="posts.users.id == user.id">
                <Link :href="`/edit/${posts.id}`" type="button" class="inline-flex  justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                focus-visible:outline-indigo-600">수정</Link>
            </div>
        </div>
    </form>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps(['posts', 'user']);

// const mode =  computed()
console.log(props);

console.log(props.posts.title);
console.log(props.posts.content);

const form = useForm({
    title: props.posts.title,
    content: props.posts.content
});

</script>
