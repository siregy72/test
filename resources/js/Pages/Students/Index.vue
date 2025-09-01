<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    students: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Students
            </h2>
        </template>

        <div class="py-12">
            <!-- 검색은 왼쪽 추가 버튼은 오른쪽 -->
            <div class="flex justify-between items-center">
                <div class="mb-6">
                    <input type="text" class="border border-gray-300 rounded-md p-2" placeholder="Search">
                </div>
                <div class="mb-6">
                    <Link :href="route('students.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Student</Link>
                </div>
            </div>

            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 border-b border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Class</th>
                        <th class="px-6 py-3 border-b border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Section</th>
                        <th class="px-6 py-3 border-b border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-3 border-b border-gray-300 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in students.data" :key="student.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 border-b border-gray-300">{{ student.id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 border-b border-gray-300">{{ student.name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 border-b border-gray-300">{{ student.email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 border-b border-gray-300">{{ student.class.name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 border-b border-gray-300">{{ student.section.name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 border-b border-gray-300">{{ student.created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm leading-5 text-gray-900 border-b border-gray-300">
                            <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination :data="students" />
        </div>
    </AuthenticatedLayout>
</template>
