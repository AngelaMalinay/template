<script setup lang="ts">
import { ref } from 'vue';
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { SidebarGroup, SidebarGroupLabel } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import AppLogo from './AppLogo.vue';
import { LayoutGrid, UserRoundCog, BarChart3, Cog, HardDriveDownload, Building2, Printer } from 'lucide-vue-next';

interface DropdownNavItem extends NavItem {
    children?: NavItem[];
    isOpen?: boolean;
}

const user = usePage().props.auth.user as any;

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'User Management',
        href: '/users',
        icon: UserRoundCog,
    },
    {
        title: 'Checks',
        href: '/checks',
        icon: Printer,
    },
];



const reportItems = ref<DropdownNavItem[]>([
        {
            title: 'Reports',
            href: '#',
            icon: BarChart3,
            isOpen: false,
            children: [
            { title: 'Item 1', href: '#'},
            { title: 'Item 2', href: '#'},
            ],
        },
    ]);

const footerNavItems: NavItem[] = [
    {
        title: 'Configuration',
        href: '/profile-pictures',
        icon: LayoutGrid,
    },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
            <NavMain :items="reportItems" group-label="Reports" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" v-if="user.role === 'admin'"/>
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
