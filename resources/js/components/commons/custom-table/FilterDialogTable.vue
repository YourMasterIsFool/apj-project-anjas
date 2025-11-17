<script setup lang="ts">
import { Button } from "@/components/ui/button"
import {
    Dialog,
    DialogContent,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from "@/components/ui/dialog"

interface PropsType {
    open: boolean
}

const props = withDefaults(defineProps<PropsType>(), {
    open: false
})

const emits = defineEmits(['onSubmit', "onOpenChange", "onCancel", "onFilter"]);


</script>

<template>
    <Dialog :open="props.open" @update:open="emits('onOpenChange')">

        <DialogContent class="sm:max-w-[425px] grid-rows-[auto_minmax(0,1fr)_auto] p-0 max-h-[90dvh]">

            <DialogHeader class=" p-6 pb-0">
                <DialogTitle>Filter</DialogTitle>
            </DialogHeader>
            <div class="p-6 pb-0">
                <slot> </slot>
            </div>
            <DialogFooter class="p-6 pt-0 flex items-center space-x-2">

                <Button variant="ghost" @click="emits('onCancel')" type="button">
                    Cancel
                </Button>

                <Button @click="emits('onSubmit')" type="submit">
                    Filter
                </Button>
            </DialogFooter>

        </DialogContent>
    </Dialog>
</template>