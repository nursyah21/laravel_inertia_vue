<!-- https://inertiajs.com/file-uploads -->

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

const props = defineProps({
    topic: Object,
    image: String
})

const form = useForm({
    name: props.topic.name,
    image: null
})

function submit() {
    router.post(`/topics/${props.topic.id}`, {
        _method: 'put',
        name: form.name,
        image: form.image
    })
}

</script>

<template>
    <Head title="Topics" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Topics</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="container px-4 mx-auto">
                    <div class="flex flex-col">
                        <div class="pb-4 justify-start flex">
                            <Link href="/topics" class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                                Back
                            </Link>
                        </div>

                        <!-- form update -->
                        <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                            <form @submit.prevent="submit">
                            <div class="flex flex-col">
                                <!-- name -->
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                                    <input v-model="form.name" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                </div>

                                <!-- image -->
                                <div class="py-2">
                                    <label class="text-gray-700 dark:text-gray-200" for="image">Image</label>
                                    <!-- thumbnail image -->
                                    <div class="my-2 p-2 flex justify-center">
                                        <img class="w-48" :src="image" alt="">
                                    </div>

                                    <input @input="form.image = $event.target.files[0]" type="file" class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300" />
                                </div>
                            </div>
                            <div class="flex mt-6">
                                <button type="submit" class="w-full px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">update</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
