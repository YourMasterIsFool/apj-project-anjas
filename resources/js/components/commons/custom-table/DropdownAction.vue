<script setup lang="ts" generic="T extends {
    id:number
}">
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'
import { PermissionsUrl } from '@/types/permissions';

import { Eye, Trash2Icon } from 'lucide-vue-next';

import { Link, router, } from '@inertiajs/vue3';
import { useConfirm } from '@/composables/useConfirm';



interface PropsType {
    permissionsUrl: PermissionsUrl;
    item: T

}
const props = defineProps<PropsType>();

const confirm = useConfirm();


if (!props.permissionsUrl) {
    throw new Error("props permissions url is needed")
}


const deleteData = async () => {
    const ok = await confirm("Are you sure delete this data");

    if (ok) {
        if (props.item && props.permissionsUrl.deleteUrl) router.delete(props.permissionsUrl.deleteUrl?.replace(":id", props.item.id.toString()), {
            preserveScroll: true,
            preserveState: false, // ini biar data re-fetch dari server
            onSuccess: () => {

            },
            onError: () => {
                alert('Gagal menghapus data')
            },
        });
    }
    else {

    }
}

</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger>
            Action
        </DropdownMenuTrigger>
        <DropdownMenuContent>
            <DropdownMenuLabel>Action</DropdownMenuLabel>
            <DropdownMenuSeparator />
            <DropdownMenuItem v-if="props.permissionsUrl.detailUrl">
                <Link :href="props.permissionsUrl.detailUrl.replace(':id', props.item.id.toString())">
                <div class="flex space-x-2 items-center">
                    <Eye class="" />
                    <span>
                        Detail
                    </span>
                </div>
                </Link>
            </DropdownMenuItem>
            <DropdownMenuItem v-if="props.permissionsUrl.deleteUrl" class="cursor-pointer">
                <div @click="deleteData" class="text-red-500 flex space-x-2 items-center">
                    <Trash2Icon class="text-red-500" />
                    <span>
                        Delete
                    </span>
                </div>
            </DropdownMenuItem>

        </DropdownMenuContent>
    </DropdownMenu>
</template>