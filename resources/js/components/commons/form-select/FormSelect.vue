<script setup lang="ts" generic="T = IGeneralDataEmbed | string">
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
import { Label } from '@/components/ui/label'
import { IFormInterface } from '@/types/forms'
import { IGeneralDataEmbed } from '@/types/generalDataEmbed'
import { computed } from 'vue';
import { AcceptableValue } from 'reka-ui';

interface PropsType extends IFormInterface<T> {
    options: IGeneralDataEmbed[]
    value: T
    placeholder?: string,

}

const props = defineProps<PropsType>()
const emits = defineEmits<{
    (e: 'onChange', value: T): void
}>()

// 🔒 helper untuk dapatkan value actual (string)
const currentValue = computed(() => {
    // kalau props.value adalah object (IGeneralDataEmbed)
    if (typeof props.value === 'object' && props.value !== null && 'value' in props.value) {
        return (props.value as IGeneralDataEmbed).value
    }
    // kalau props.value adalah string langsung
    return props.value as string
})

function handleChange(val: AcceptableValue) {
    // kirim hasil yang sesuai tipe generic
    if (typeof props.value === 'string') {
        emits('onChange', val as T)
    } else {
        // cari object yang sesuai dari options
        const found = props.options.find(opt => opt.value === val)
        emits('onChange', (found ?? (val as any)) as T)
    }
}
</script>

<template>
    <div>
        <Label class="lg:mb-3 mb-3">{{ props.label }}</Label>
        <Select :default-value="currentValue" @update:model-value="(value) => handleChange(value)">
            <SelectTrigger>
                <SelectValue :placeholder="props.placeholder" />
            </SelectTrigger>
            <SelectContent>
                <SelectGroup>
                    <SelectItem v-for="item in props.options" :key="item.value" :value="item.value ?? ''">
                        {{ item.name }}
                    </SelectItem>
                </SelectGroup>
            </SelectContent>
        </Select>
    </div>
</template>
