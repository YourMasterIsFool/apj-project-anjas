<script setup lang="ts">
import { Button } from "@/components/ui/button"
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from "@/components/ui/dialog"

interface PropsType {
    open: boolean,
    title?: string,
    description?: string,
}
const props = withDefaults(defineProps<PropsType>(), {
    open: false
})

const emits = defineEmits(["onOpenChange", "deletedConfirm"]);
</script>

<template>
    <Dialog :open="props.open" @update:open="emits('onOpenChange')">
        <DialogContent class="sm:max-w-[425px]">
            <DialogHeader>
                <DialogTitle>{{ props.title }} </DialogTitle>
                <DialogDescription>
                    {{ props.description }}
                </DialogDescription>
            </DialogHeader>

            <DialogFooter class="flex items-center space-x-2">
                <Button @click="emits('onOpenChange')" class="bg-gray-200 text-black rounded-md">
                    Cancel
                </Button>
                <Button @click="emits('deletedConfirm')" class="text-white bg-red-500 rounded-md" type="submit">
                    Delete
                </Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>