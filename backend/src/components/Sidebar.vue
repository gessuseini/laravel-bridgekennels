<script setup lang="ts">
import {
    CircleUser,
    Copy,
    CreditCard,
    CircleHelp,
    File,
    Home,
    LineChart,
    ListFilter,
    MoreVertical,
    Package,
    Package2,
    Contact,
    PanelLeft,
    Search,
    Settings,
    ShoppingCart,
    Truck,
    Users2,
    Users,
    AtSign,
    Send,
    Dog,
} from 'lucide-vue-next'
import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from '@/components/ui/tooltip'
</script>

<template>
    <aside class="fixed inset-y-0 left-0 z-10 hidden w-14 flex-col border-r bg-background sm:flex">
        <nav class="flex flex-col items-center gap-4 px-2 sm:py-5">
            <a
                href="#"
                class="group flex h-9 w-9 shrink-0 items-center justify-center gap-2 rounded-full bg-primary text-lg font-semibold text-primary-foreground md:h-8 md:w-8 md:text-base"
            >
                <Package2 class="h-4 w-4 transition-all group-hover:scale-110" />
                <span class="sr-only">Acme Inc</span>
            </a>
            <router-link
                :to="{ name: 'app.dashboard' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <Home class="h-5 w-5" />
                            <span class="sr-only">Dashboard</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Dashboard
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider></router-link>
            <router-link
                :to="{ name: 'app.dogs' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <Dog class="h-5 w-5" />
                            <span class="sr-only">Dogs</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Dogs
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.breedings' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <Dog class="h-5 w-5" /><Dog class="h-5 w-5" />
                            <span class="sr-only">Breedings</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Breedings
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.products' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <Package class="h-5 w-5" />
                            <span class="sr-only">Products</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Products
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.users' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <CircleUser class="h-5 w-5" />
                            <span class="sr-only">Users</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Users
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.team-members' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <Contact class="h-5 w-5" />
                            <span class="sr-only">Team</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Team
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.subscribers' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <AtSign class="h-5 w-5" />
                            <span class="sr-only">Subscribers</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Subscribers
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.faqs' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <CircleHelp class="h-5 w-5" />
                            <span class="sr-only">FAQs</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        FAQs
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.newsletters' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <Send class="h-5 w-5" />
                            <span class="sr-only">Newsletters</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Newsletters
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>

            <router-link
                :to="{ name: 'app.analytics' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <LineChart class="h-5 w-5" />
                            <span class="sr-only">Analytics</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Analytics
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>
        </nav>
        <nav class="mt-auto flex flex-col items-center gap-4 px-2 sm:py-5">
            <router-link
                :to="{ name: 'app.settings' }" v-slot="{ isActive }"><TooltipProvider>
                <Tooltip>
                    <TooltipTrigger as-child>
                        <span
                            :class="['flex h-9 w-9 items-center justify-center rounded-lg transition-colors md:h-8 md:w-8', isActive ? 'bg-accent text-accent-foreground' : 'text-muted-foreground hover:text-foreground']"
                        >
                            <Settings class="h-5 w-5" />
                            <span class="sr-only">Settings</span>
                        </span>
                    </TooltipTrigger>
                    <TooltipContent side="right">
                        Settings
                    </TooltipContent>
                </Tooltip>
            </TooltipProvider>
            </router-link>
        </nav>
    </aside>


</template>
