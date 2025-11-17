<script lang="ts" setup>

interface IDashboardCardProps {
    title: string
    value: string
}

const props = defineProps<IDashboardCardProps>()

</script>

<template>
    <div class="flex space-y-2 flex-col p-4 bg-white/5 rounded-md items-start">
        <header>
            <p class="lg:text-lg capitalize text-sm ">
                {{ props.title }}
            </p>
        </header>
        <main class="font-bold">
            <p class="font-bold text-xl"> {{ props.value }}</p>
        </main>
    </div>
</template>