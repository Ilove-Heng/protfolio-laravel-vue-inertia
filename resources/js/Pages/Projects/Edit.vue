<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    project: Object,
    skills: Array,
})

const form = useForm({
    name: props.project?.name,
    image: props.project?.image,
    skill_id: props.project?.skill_id,
    project_url: props.project?.project_url,
});

const submit = () => {
    console.log('edit');
    router.post(`/projects/${props.project.id}`, {
        _method: 'put',
        name: form.name,
        image: form.image,
        skill_id: form.skill_id,
        project_url: form.project_url,
    });
};


</script>

<template>
    <Head title="Edit Project" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Project</h2>
        </template>

        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                <form @submit.prevent="submit" class="p-2">

                    <InputLabel for="skill" value="Skill" />
                    <select id="skill_id" name="skill_id"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-200 focus:border-indigo-200 sm:text-sm rounded-md"
                        v-model="form.skill_id">
                        <option v-for="skill in props.skills" :key="skill" :value="skill.id">{{ skill.name }}</option>
                    </select>
                    <InputError class="mt-2" :message="$page.props.errors.skill_id" />
                    <div>
                        <InputLabel for="name" value="Name" />

                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                            autocomplete="name" />

                        <InputError class="mt-2" :message="$page.props.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="project_url" value="URL" />

                        <TextInput id="project_url" type="text" class="mt-1 block w-full" v-model="form.project_url"
                            autofocus autocomplete="name" />

                        <InputError class="mt-2" :message="$page.props.errors.project_url" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="image" value="Image" />

                        <TextInput id="image" type="file" class="mt-1 block w-full"
                            @input="form.image = $event.target.files[0]" />

                        <InputError class="mt-2" :message="$page.props.errors.image" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update Project
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>