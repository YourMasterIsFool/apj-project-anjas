<script setup lang="ts" generic="T = IGeneralDataEmbed">
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
    canNullable?: boolean

}

const props = defineProps<PropsType>()
const emits = defineEmits<{
    (e: 'onChange', value: IGeneralDataEmbed): void
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
    const found = props.options.find(opt => opt.value === val ? val.toString() : null)
    emits('onChange', (found ?? (val as any)) as IGeneralDataEmbed)
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
                    <SelectItem v-if="props.canNullable" key="kosong" :value="null">
                        Tidak Diisi
                    </SelectItem>
                    <SelectItem v-for="item in props.options" :key="item.value" :value="item.value ?? ''">
                        {{ item.name }}
                    </SelectItem>
                </SelectGroup>
            </SelectContent>
        </Select>
    </div>
</template>
