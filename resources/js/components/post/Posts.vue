<template>
    <div class="p-10">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">
                    게시판
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            </div>
        </div>
        <div class="pt-10">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr
                        class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            번호
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                            style="width: 300px;">
                            제목
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            작성자
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            등록일자
                        </th>

                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            조회수
                        </th>
                    </tr>
                </thead>
                <tbody class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border border-gray-300">
                    <tr style="text-align: center;"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        v-for="(post, idx) in posts.data" :key="idx">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ (posts.current_page - 1) * posts.per_page + idx + 1 }}

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <Link :href="`show/${post.id}`">
                            {{ post.title }}
                            </Link>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ post.users.name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ new Date(post.created_at).toLocaleDateString() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ post.view_count }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 flex justify-end">
                <Link href="create" type="button"
                class="block rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                등록
                </Link>
            </div>
        </div>
    </div>
    <Paginate :next="posts.next_page_url" :prev="posts.prev_page_url" :currentPage="posts.current_page"
        :lastPage="posts.last_page" class="mt-4" />
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import Paginate from "@/components/Paginate.vue";

defineProps(["posts"]);

// console.log(posts.data);


</script>
