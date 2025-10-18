<script lang="ts" setup generic="T extends IGeneralDataEmbed">
import { toRef } from 'vue'
import { Label } from '@/components/ui/label'
import { Input } from '@/components/ui/input'
import { IFormInterface } from '@/types/forms'
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';

interface PropsType<TForm = Record<string, any>> extends IFormInterface<T> {
    label?: string
    form: TForm
    placeholder?: string
    name: keyof TForm
    id?: string
    type?: "number" | "text" | "password"
}

const props = defineProps<PropsType>()

// buat reactive model dari prop form
const model = toRef(props.form, props.name as string)

console.log(props.form)
</script>

<template>
    <div>
        <Label :for="props.id || props.name" class="lg:mb-3 mb-3">
            {{ props.label }}
        </Label>

        <Input :type="props.type || 'text'" class="lg:mb-2 mb-2" :id="props.id || props.name" v-model="model"
            :placeholder="props.placeholder || ''" />

        <p v-if="props.form.errors?.[props.name]" class="text-sm text-destructive">
            {{ props.form.errors[props.name] }}
        </p>
    </div>
</template>
