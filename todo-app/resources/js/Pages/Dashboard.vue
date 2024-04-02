<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <div>

        <Head title="Dashboard" />

        <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Todo List</h2>
            </template>



            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                <div class="md:flex">
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Todo List</div>
                        <input v-model="newTask" @keyup.enter="addTask"
                            class="w-full px-5 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                            type="text" placeholder="Add new task">
                        <ul class="mt-3 space-y-3">
                            <li v-for="(task, index) in tasks" :key="index" class="flex items-center space-x-3">
                                <input type="checkbox" v-model="task.completed">
                                <span :class="{ 'line-through': task.completed, 'text-gray-500': task.completed }">{{
                            task.name
                                    }}</span>
                                <button @click="deleteTask(index)"
                                    class="ml-auto text-red-500 hover:text-red-700">Delete</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </AuthenticatedLayout>
    </div>
</template>


<script>
export default {
  data() {
    return {
      newTask: '',
      tasks: []
    }
  },
  methods: {
    addTask() {
      if (this.newTask) {
        this.tasks.push({ name: this.newTask, completed: false });
        this.newTask = '';
      }
    },
    deleteTask(index) {
      this.tasks.splice(index, 1);
    }
  }
}
</script>

<style scoped>
.line-through {
  text-decoration: line-through;
}
</style>
