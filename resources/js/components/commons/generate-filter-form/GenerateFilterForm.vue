<script lang="ts" setup generic="T">
import { GenerateFilterFormProps } from '.';
import AsyncSelect from '../async-select/AsyncSelect.vue';
import { onMounted, ref, watch } from 'vue';
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';


const props = defineProps<GenerateFilterFormProps>()

const params = ref<Record<string, any>>({})

const emits = defineEmits(['onChange']);

watch(params, (value) => {
    emits('onChange', value)
    console.log(value)
}, {
    deep: true
})

onMounted(() => {
    props.params.forEach((item) => {
        params.value = {
            ...params.value,
            [item.param_name]: ""
        }
    })
})


console.log(params.value);

</script>


<template>
    <div class="grid grid-cols-1 gap-4">
        <AsyncSelect :value="params[param.param_name]" v-for="param in props.params" :label="param.label"
            @update:model-value="(value) => params[param.param_name] = value?.value" :key="param.param_name"
            :options="param.options as IGeneralDataEmbed[] ?? []" />


    </div>
</template>
