<script setup lang="ts" generic="T = IGeneralDataEmbed">
import { Check, ChevronsUpDown, Search } from "lucide-vue-next"
import { onMounted, ref, watch } from "vue"
import { Button } from "@/components/ui/button"
import { Combobox, ComboboxAnchor, ComboboxEmpty, ComboboxGroup, ComboboxInput, ComboboxItem, ComboboxItemIndicator, ComboboxList, ComboboxTrigger } from "@/components/ui/combobox"
import { cn } from "@/lib/utils"
import { FormSelectProps } from "@/types/form-select"
import { IGeneralDataEmbed } from "@/types/generalDataEmbed"
import Label from "@/components/ui/label/Label.vue"


const props = defineProps<FormSelectProps<T>>();
const value = ref<IGeneralDataEmbed | undefined>();

const emits = defineEmits<{
    (e: 'update:modelValue', value: IGeneralDataEmbed | undefined): void
}>()

watch(value, (val) => {
    emits('update:modelValue', val as IGeneralDataEmbed)
})

onMounted(() => {
    if (props.value) {
        value.value = props.options.find((item) => item.value == props.value);
    }
})
</script>

<template>
    <div class="flex flex-col space-y-2 w-full!">

        <Label :for="props.label" class="mb-2">
            {{ props.label }}
        </Label>
        <Combobox v-model="value" class="w-full">
            <ComboboxAnchor class=" w-full" as-child>
                <ComboboxTrigger as-child>
                    <Button variant="outline" class="justify-between">
                        {{ value?.name ?? props.placeholder }}
                        <ChevronsUpDown class="ml-2 h-4 w-4 shrink-0 opacity-50" />
                    </Button>
                </ComboboxTrigger>
            </ComboboxAnchor>

            <ComboboxList class="w-full">
                <div class="relative w-full  items-center">
                    <ComboboxInput class="pl-9 w-full focus-visible:ring-0 border-0 border-b rounded-none h-10"
                        :placeholder="props.placeholder" />
                    <span class="absolute start-0 inset-y-0 flex items-center justify-center px-3">
                        <Search class="size-4 text-muted-foreground" />
                    </span>
                </div>

                <ComboboxEmpty>
                    No Items Found
                </ComboboxEmpty>

                <ComboboxGroup class="w-full">
                    <ComboboxItem v-for="framework in props.options" :key="framework.value" :value="framework">
                        {{ framework.name }}

                        <ComboboxItemIndicator>
                            <Check :class="cn('ml-auto h-4 w-4')" />
                        </ComboboxItemIndicator>
                    </ComboboxItem>
                </ComboboxGroup>
            </ComboboxList>
        </Combobox>
        <p v-if="props.error" class="text-sm text-destructive">
            {{ props.error }}
        </p>
    </div>
</template>