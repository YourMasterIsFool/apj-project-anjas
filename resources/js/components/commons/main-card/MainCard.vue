<script setup lang="ts">
import { defineEmits, onBeforeMount } from 'vue';


const emits = defineEmits(["permissions"]);

interface PropsType {
    title?: string,

}

const { title } = defineProps<PropsType>();
const permissionsHandler = () => {
    emits("permissions",);
}
onBeforeMount(() => {
    permissionsHandler()
},)

</script>
<template>
    <div class="xl:p-6 md:p-4 p-3">
        <h1 class="xl:py-4 lg:text-2xl text-xl text-white font-bold py-3">
            {{ title }}
        </h1>
        <header class="">
            <slot name="header"></slot>

        </header>

        <main>
            <slot name="main"></slot>
        </main>
        <footer>
            <slot name="footer"></slot>
        </footer>
    </div>
</template>