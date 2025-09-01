<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { watch, ref } from 'vue';

defineProps({
    classes: {
        type: Object,
        required: true,
    },
    sections: {
        type: Object,
        required: true,
    },
});

let sections = ref({});

const form = useForm({
    name: '',
    email: '',
    class_id: '',
    section_id: '',
});

watch(
    () => form.class_id,
    (newValue) => {
        getSections(newValue);
});

const getSections = (classId) => {
    axios.get('/api/sections?class_id=' + classId).then((response) => {
        sections.value = response.data;
    });
};
</script>

<template>

    <Head title="Create Student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Student
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form>
                            <div>
                                <label>Name</label>
                                <input v-model="form.name" type="text" id="name"></input>
                                <p class="mt-1 text-sm text-red-500">{{ form.errors.name }}</p>
                            </div>
                            <div>
                                <label>Email</label>
                                <input v-model="form.email" type="email" id="email" autocomplete="email"></input>
                                <p class="mt-1 text-sm text-red-500">{{ form.errors.email }}</p>
                            </div>
                            <div>
                                <label>Class</label>
                                <select v-model="form.class_id" id="class_id">
                                    <option value=""> select a class</option>
                                    <option v-for="item in classes.data" :key="item.id" :value="item.id">{{ item.name }}
                                    </option>
                                </select>
                                <p>error</p>
                            </div>
                            <div>
                                <label>Section</label>
                                <select v-model="form.section_id" id="section_id">
                                    <option value=""> select a section</option>
                                    <option v-for="section in sections.data" :key="section.id" :value="section.id">{{ section.name
                                        }}
                                    </option>
                                </select>
                                <p>error</p>
                            </div>
                        </form>
                        <div>
                            <button>Create</button>
                            <button>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
