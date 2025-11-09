<script setup lang="ts" generic="T extends {
    id:number
}">
import type {
    ColumnDef,
    ColumnFiltersState,
    ExpandedState,
    SortingState,
    VisibilityState,
} from "@tanstack/vue-table"
import { FilterIcon, Plus } from "lucide-vue-next";
import FilterDialogTable from "./FilterDialogTable.vue";


import { DownloadCloudIcon } from "lucide-vue-next";

import {

    createColumnHelper,
    FlexRender,
    getCoreRowModel,
    getExpandedRowModel,
    getFilteredRowModel,
    getPaginationRowModel,
    getSortedRowModel,
    useVueTable,
} from "@tanstack/vue-table"

import { computed, reactive, ref, watch, } from "vue"

import { valueUpdater } from "@/lib/utils"
import { Button } from "@/components/ui/button"

import {
    DropdownMenu,
    DropdownMenuCheckboxItem,
    DropdownMenuContent,
} from "@/components/ui/dropdown-menu"
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table"


import { PermissionsUrl } from "@/types/permissions"
import { h } from "vue"
import DropdownAction from "./DropdownAction.vue"
import { RefreshCcw } from "lucide-vue-next"
import { router, usePage } from "@inertiajs/vue3"
import { PaginationResponse } from "@/types/paginationResponse";
import { PaginationRequest } from "@/types/paginationRequest";
import Input from "@/components/ui/input/Input.vue";


export interface Payment {
    id: string
    amount: number
    status: "pending" | "processing" | "success" | "failed"
    email: string
}

interface PropsType {
    content: PaginationResponse<T>,
    columns: ColumnDef<T, any>[],
    permissionsUrl: PermissionsUrl,
    data: T[]
}

const props = withDefaults(defineProps<PropsType>(), {
    columns: () => {
        return []
    },
    data: () => {
        return []
    }
})


const emits = defineEmits(['onFilter'])

const page = usePage();


const sorting = ref<SortingState>([])
const columnFilters = ref<ColumnFiltersState>([])
const columnVisibility = ref<VisibilityState>({})
const rowSelection = ref({})
const expanded = ref<ExpandedState>({})

const columnHelper = createColumnHelper<T>();

const actionColumn: ColumnDef<T, any>[] = [
    columnHelper.display({
        id: "actions",
        enableHiding: false,
        header: "Action",
        cell: ({ row }) => {
            const item = row.original as T;

            return h("div", { class: "relative" }, h(DropdownAction, {
                onExpand: row.toggleExpanded,
                permissionsUrl: props.permissionsUrl,
                item: item
            }))
        },
    }),
]




const table = computed(() =>
    useVueTable({
        data: props.content.data,
        columns: [...props.columns, ...actionColumn],
        getCoreRowModel: getCoreRowModel(),
        getPaginationRowModel: getPaginationRowModel(),
        getSortedRowModel: getSortedRowModel(),
        getFilteredRowModel: getFilteredRowModel(),
        getExpandedRowModel: getExpandedRowModel(),
        onSortingChange: updaterOrValue => valueUpdater(updaterOrValue, sorting),
        onColumnFiltersChange: updaterOrValue => valueUpdater(updaterOrValue, columnFilters),
        onColumnVisibilityChange: updaterOrValue => valueUpdater(updaterOrValue, columnVisibility),
        onRowSelectionChange: updaterOrValue => valueUpdater(updaterOrValue, rowSelection),
        onExpandedChange: updaterOrValue => valueUpdater(updaterOrValue, expanded),
        state: {
            get sorting() { return sorting.value },
            get columnFilters() { return columnFilters.value },
            get columnVisibility() { return columnVisibility.value },
            get rowSelection() { return rowSelection.value },
            get expanded() { return expanded.value },
        },
    })
)

const refreshHandler = () => {
    router.get(props.permissionsUrl.listUrl ?? "")
}

const openFilter = ref<boolean>(false);

const params = reactive<PaginationRequest>({
    cursor: undefined,
    limit: 10,
    search: undefined
})

const filterParams = reactive<any>({});


const nextPaginationHandler = () => {
    console.log("next");
    params.cursor = props.content.next_cursor
}

const prevPaginationHandler = () => {
    params.cursor = props.content.prev_cursor
}
watch(params, (value) => {


    if (!value) return
    router.get(page.url ?? '', { ...value, ...filterParams }, {
        preserveState: true,
        replace: true,
    })
}, { deep: true })

watch(filterParams, (value) => {
    if (!value) return
    router.get(page.url ?? '', value, {
        preserveState: true,
        replace: true,
    })
}, { deep: true })

const handleExport = () => {

    if (props.permissionsUrl && props.permissionsUrl.exportUrl) {

        const payload = new URLSearchParams();

        if (params.search) payload.append("search", params.search)
        window.open(props.permissionsUrl.exportUrl + `?${payload.toString()}`)
    }
}


</script>

<template>
    <div class="w-full">
        <FilterDialogTable @on-filter="emits('onFilter')" :open="openFilter" @onCancel="openFilter = false"
            @onOpenChange="openFilter = !openFilter">
            <slot name="filter">
                w
            </slot>
        </FilterDialogTable>
        <div class="flex justify-end items-center space-x-3">
            <Button variant="outline"
                class="transition-all duration-300 bg-green-50 cursor-pointer  text-green-600 hover:bg-green-600 hover:text-white"
                v-if="props.permissionsUrl && props.permissionsUrl.exportUrl" @click="handleExport">
                <DownloadCloudIcon />
            </Button>

            <Button variant="secondary" @click="openFilter = true">
                <FilterIcon />
            </Button>
            <Button variant="secondary" @click="refreshHandler">
                <RefreshCcw />
            </Button>
            <div>
                <Input placeholder="search ..." v-model="params.search" />
            </div>

            <Button v-if="props.permissionsUrl && props.permissionsUrl.createUrl"
                @click="router.visit(props.permissionsUrl.createUrl)" variant="default">
                <Plus />
                <span>
                    Create
                </span>

            </Button>

        </div>
        <div class=" flex gap-2 items-center py-4">
            <DropdownMenu>
                <DropdownMenuContent align="end">
                    <DropdownMenuCheckboxItem
                        v-for="column in table.getAllColumns().filter((column) => column.getCanHide())" :key="column.id"
                        class="capitalize" :model-value="column.getIsVisible()" @update:model-value="(value) => {
                            column.toggleVisibility(!!value)
                        }">
                        {{ column.id }}
                    </DropdownMenuCheckboxItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </div>
        <div class="rounded-md border">
            <Table>
                <TableHeader>
                    <TableRow v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id">
                        <TableHead v-for="header in headerGroup.headers" :key="header.id">
                            <FlexRender v-if="!header.isPlaceholder" :render="header.column.columnDef.header"
                                :props="header.getContext()" />
                        </TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <template v-if="table.getRowModel().rows?.length">
                        <template v-for="row in table.getRowModel().rows" :key="row.id">
                            <TableRow :data-state="row.getIsSelected() && 'selected'">
                                <TableCell v-for="cell in row.getVisibleCells()" :key="cell.id">
                                    <FlexRender :render="cell.column.columnDef.cell" :props="cell.getContext()" />
                                </TableCell>
                            </TableRow>
                            <TableRow v-if="row.getIsExpanded()">
                                <TableCell :colspan="row.getAllCells().length">
                                    {{ JSON.stringify(row.original) }}
                                </TableCell>
                            </TableRow>
                        </template>
                    </template>

                    <TableRow v-else>
                        <TableCell :colspan="columns.length" class="h-24 text-center">
                            No results.
                        </TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        </div>

        <div class="flex items-center justify-end space-x-2 py-4">
            <div class="flex-1 text-sm text-muted-foreground">
                {{ table.getFilteredSelectedRowModel().rows.length }} of
                {{ table.getFilteredRowModel().rows.length }} row(s) selected.
            </div>
            <div class="space-x-2">
                <Button :disabled="props.content.prev_cursor == null"
                    :variant="props.content.prev_cursor != null ? 'default' : 'outline'" size="sm"
                    @click="prevPaginationHandler">
                    Previous
                </Button>
                <Button :disabled="props.content.next_page_url == null"
                    :variant="props.content.next_cursor != null ? 'default' : 'outline'" size="sm"
                    @click="nextPaginationHandler">
                    Next
                </Button>
            </div>
        </div>
    </div>
</template>