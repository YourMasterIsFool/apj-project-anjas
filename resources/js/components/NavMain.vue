<script setup lang="ts">
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { urlIsActive } from '@/lib/utils';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';

defineProps<{
    items: NavItem[];
}>();

const page = usePage();
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Platform</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="item in items" :key="item.title">
                <SidebarMenuButton v-if="!item.children" as-child :tooltip="item.title">
                    <Link :href="item.href">
                    <component :is="item.icon" />
                    <span>{{ item.title }}</span>
                    </Link>
                </SidebarMenuButton>

                <div v-else>
                    <SidebarMenuButton as-child :tooltip="item.title">
                        <Link>
                        <component :is="item.icon" />
                        <span>{{ item.title }}</span>
                        </Link>
                    </SidebarMenuButton>
                    <div class="pl-3 py-2" v-for="child in item.children" :key="child.title">
                        <SidebarMenuButton v-if="child.href && item.href" as-child
                            :is-active="urlIsActive(`${item.href}${child.href}`, page.url)" :tooltip="child.title">
                            <Link :href="`${item.href}${child.href}`">
                            <component :is="child.icon" />
                            <span>{{ child.title }}</span>
                            </Link>
                        </SidebarMenuButton>
                    </div>
                </div>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
