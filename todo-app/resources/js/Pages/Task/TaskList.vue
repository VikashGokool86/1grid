<script setup>
import { Inertia } from '@inertiajs/inertia';

const form = reactive({
    id: null,
    title: null,
    description: null,
    completed: null
});

</script>
<template>

    <div v-if="task">
        <div class="container mx-auto p-6">
            <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg">
                <!-- Short View -->
                <div v-if="!showDetails" class="block">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">{{ task.title }}</h3>
                        <span :class="statusClass(task.completed)" class="px-2 py-1 text-xs font-semibold rounded">
                            <div v-if="task.completed === 0">pending</div>
                            <div v-if="task.completed === 1">in progress</div>
                            <div v-if="task.completed === 2">done</div>
                        </span>
                    </div>
                    <button @click="toggleDetails"
                        class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Toggle
                        Details</button>
                </div>

                <!-- Detailed View -->
                <div v-if="showDetails">
                    <div class="container mx-auto p-6">
                        <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg">
                            <form @submit.prevent="submitForm">
                                <!-- Title Field -->
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                    <input type="hidden" id="id" name="id" v-model="task.id" />
                                    <input type="text" id="title" name="title" v-model="task.title"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        placeholder="Task Title">
                                </div>

                                <!-- Description Field -->
                                <div class="mb-4">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="3" v-model="task.description"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        placeholder="Task Description"></textarea>
                                </div>

                                <!-- Status Dropdown -->
                                <div class="mb-4">
                                    <label for="completed"
                                        class="block text-sm font-medium text-gray-700">Status</label>
                                    <select id="completed" name="completed"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        v-model="task.completed">
                                        <option value="0">Pending</option>
                                        <option value="1">In Progress</option>
                                        <option value="2">Completed</option>
                                    </select>
                                </div>

                                <!-- Update Button -->
                                <div class="flex items-center justify-between mb-4">
                                    <button type="submit" name="update" value="update"
                                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Update
                                        Task</button>
                                </div>

                                <!-- Delete Button -->
                                <div class="flex items-center justify-between">
                                    <button type="submit" name="delete" value="delete"
                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">Delete
                                        Task</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button @click="toggleDetails"
                        class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Toggle
                        Details</button>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

import { reactive } from 'vue';


export default {
    props: {
        task: {
            type: Object,
        }
    },
    data() {
        return {
            showDetails: false,
            id: null,
            title: null,
            description: null,
            completed: 0
        };
    },
    methods: {
        toggleDetails() {
            this.showDetails = !this.showDetails;
        },
        statusClass(status) {
            return {
                'bg-green-200 text-green-800': status === 2,
                'bg-yellow-200 text-yellow-800': status === 0,
                'bg-red-200 text-red-800': status === 1
            };
        },
        submitForm(event) {
            const buttonValue = event.submitter.value;

            if (buttonValue === 'update') {
                Inertia.post('/task/update', {
                    id: this.task.id,
                    title: this.task.title,
                    description: this.task.description,
                    completed: this.task.completed
                });
            } else if (buttonValue === 'delete') {
                if (confirm('Are you sure you want to delete this task?')) {
                    Inertia.post('/task/delete', {
                        id: this.task.id
                    });
                }
            }
        }
    }
};


</script>
<style scoped></style>
