<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/inertia-vue3';

var response = null;
var error = null;

const form = useForm({
    title: null,
    description: null
});

const addTask = () => {
    form.post('/task'), {
        onFinish: () => form.reset('title', 'password_confirmation')
            .then(response => response)
            .catch(error = error.response)
    }
};

</script>

<template>
    <div>

        <Head title="AddTask" />
        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Task</h2>
            </template>
            {{  response }}


            <div class="max-w-md mx-auto mt-10">
                <h1 class="text-2xl font-bold text-center mb-6">Add New Todo</h1>
                <form @submit.prevent="addTask" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="todo-title">
                            Title
                        </label>
                        <input v-model="form.title" type="text" id="todo-title" placeholder="Enter todo title"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required />
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="todo-description">
                            Description
                        </label>
                        <textarea v-model="form.description" id="todo-description" placeholder="Enter todo description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Add Todo
                        </button>
                    </div>
                </form>
            </div>



            <!-- <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <h2 class="text-lg font-medium text-gray-900">Add Task</h2>

                        <label class="block font-medium text-sm text-gray-700" for="name">
                            <span>Name Task</span>
                        </label>

                    </div>
                </div>
            </div> -->
        </AuthenticatedLayout>
    </div>
</template>
