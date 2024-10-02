<script setup>
import Posts from "@/components/post/Posts.vue";

defineProps(["posts"]);

</script>

<template>
   <Posts :posts="posts" />
</template>

