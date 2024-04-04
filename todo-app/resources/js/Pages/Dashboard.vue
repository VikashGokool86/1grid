<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
import TaskList from './Task/TaskList.vue';
</script>

<template>
    <div>

        <Head title="Task List" />
        <AuthenticatedLayout>
            <template #header>
                <div class="header2">
                    <h2 class="header_title font-semibold text-xl text-gray-800 leading-tight">My Todo List</h2>
                    <Link :href="route('task.add_task')">
                    <div>
                        <PrimaryButton class="ms-4">
                            Add Task
                        </PrimaryButton>
                    </div>
                    </Link>
                </div>
            </template>
            <div class="task_wrapper">
                <div class="notDoneTasksWrapper">
                    <div v-if="$page.props.tasks">
                        <div v-for="task in $page.props.tasks" :key="task.id">
                            <task-list
                                :task="task"
                            ></task-list>
                        </div>
                    </div>
                    <div v-else>
                        <p> No  Tasks to display</p>
                    </div>
                </div>

            </div>
        </AuthenticatedLayout>
    </div>
</template>


<script>
export default {
  components: { TaskList },
    props: {
        tasks: null
    }
}
</script>

<style scoped>
.header2 {
    display: flex;
}

.header_title {
    flex-grow: 1;
}

</style>
