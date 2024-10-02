<template>
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="/public/build/assets/gemiso_logo.png" alt="Your Company" />
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">회원가입</h2>
      </div>
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="#" method="POST" @submit.prevent="submit">
          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1
               ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
               v-model="form.email"
               @input="handleInput"
                />
            </div>
            <small class="text-red-500" v-if="form.errors.email">
                {{ form.errors.email }}
            </small>
          </div>
          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">비밀번호</label>

            </div>
            <div class="mt-2">
              <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0
               py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                focus:ring-indigo-600 sm:text-sm sm:leading-6"
                v-model="form.password"
                @input="handleInput" />
            </div>
            <small class="text-red-500" v-if="form.errors.password">
                {{ form.errors.password }}
            </small>
          </div>
          <div>
            <div class="flex items-center justify-between">
              <label for="name" class="block text-sm font-medium leading-6 text-gray-900">이름</label>
            </div>
            <div class="mt-2">
              <input id="name" name="name" type="text" autocomplete="current-password" class="block w-full rounded-md border-0
               py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                focus:ring-indigo-600 sm:text-sm sm:leading-6"
                v-model="form.name"
                @input="handleInput" />
            </div>
            <small class="text-red-500" v-if="form.errors.name">
                {{ form.errors.name }}
            </small>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">전화번호</label>
            </div>
            <div class="mt-2">
              <input id="phone" name="phone" type="text" class="block w-full rounded-md border-0
               py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                focus:ring-indigo-600 sm:text-sm sm:leading-6"
                v-model="form.phone"
                @input="handleInput" />
            </div>
            <small class="text-red-500" v-if="form.errors.phone">
                {{ form.errors.phone }}
            </small>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="department" class="block text-sm font-medium leading-6 text-gray-900">부서</label>

            </div>
            <div class="mt-2">
              <input id="department" name="department" type="text"  class="block w-full rounded-md border-0
               py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                focus:ring-indigo-600 sm:text-sm sm:leading-6"
                v-model="form.department"
                @input="handleInput" />
            </div>
            <small class="text-red-500" v-if="form.errors.department">
                {{ form.errors.department }}
            </small>
          </div>

          <div>
            <!-- <Link href="/auth/login" method="post" as="button" type="button"
            :data="form"
            replace
            > -->

            <button type="submit"
            class="mt-2 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
             focus-visible:outline-indigo-600"
            >
                회원가입
            </button>
            <!-- </Link> -->
          </div>
        </form>
      </div>
    </div>
  </template>

<script setup>
import { onMounted, reactive } from "vue";
import { Link, useForm } from "@inertiajs/vue3";


const form = useForm({
    email:"",
    password:'',
    name:"",
    phone:"",
    department:"",
});

function submit() {
    form.post('register',{
        preserveScroll: true,
        onSuccess: () => {
            alert("회원가입이 완료 되었습니다!")
        },
    });
}

function handleInput(e) {
    form.clearErrors(e.target.name);
}
</script>
