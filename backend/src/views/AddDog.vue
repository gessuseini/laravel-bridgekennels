<script setup lang="ts">
import {
    ChevronLeft,
    CircleUser,
    Home,
    LineChart,
    Package,
    Package2,
    PanelLeft,
    PlusCircle,
    Search,
    Settings,
    ShoppingCart,
    Upload,
    Users2,
} from 'lucide-vue-next'

import { Badge } from '@/components/ui/badge'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card'
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from '@/components/ui/dropdown-menu'
import { Input } from '@/components/ui/input'
import { Textarea } from '@/components/ui/textarea'
import { Label } from '@/components/ui/label'
import { ToggleGroup, ToggleGroupItem } from '@/components/ui/toggle-group'
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from '@/components/ui/breadcrumb'
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet'
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table'
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from '@/components/ui/tooltip'
</script>

<template>
    <main class="grid flex-1 items-start gap-4 p-4 sm:px-6 sm:py-0 md:gap-8">
        <div class="mx-auto grid max-w-6xl pt-10 flex-1 auto-rows-max gap-4">
            <div class="flex items-center gap-4">
                <h1 class="flex-1 shrink-0 whitespace-nowrap text-xl font-semibold tracking-tight sm:grow-0">
                    Add a new Dog
                </h1>
                <div class="hidden items-center gap-2 md:ml-auto md:flex">
                    <router-link
                        :to="{ name: 'app.dogs' }"><Button variant="outline" size="sm">
                        Discard
                    </Button></router-link>
                    <Button size="sm">
                        Save Dog
                    </Button>
                </div>
            </div>
            <div class="grid gap-4 md:grid-cols-[1fr_250px] lg:grid-cols-6 lg:gap-8">
                <div class="grid auto-rows-max items-start gap-4 lg:col-span-4 lg:gap-8">
                <Card class="h-full lg:min-h-[500px]">
                    <CardHeader>
                        <CardTitle>Dog Details</CardTitle>
                        <CardDescription>
                            Lipsum dolor sit amet, consectetur adipiscing elit
                        </CardDescription>
                    </CardHeader>
                    <CardContent>
                        <div class="grid gap-6">
                            <div class="grid gap-3">
                                <Label for="name">Name of the dog</Label>
                                <Input
                                    id="name"
                                    type="text"
                                    class="w-full"
                                />
                            </div>
                            <div class="grid gap-3 h-full">
                                <Label for="description">Description</Label>
                                <Textarea
                                    id="description"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl nec ultricies ultricies, nunc nisl ultricies nunc, nec ultricies nunc nisl nec nunc."
                                    class="min-h-32 md:min-h-[300px]"
                                />
                            </div>
                        </div>
                    </CardContent>
                </Card>
                    </div>
                <div class="grid auto-rows-max items-start gap-4 lg:col-span-2 lg:gap-8">
                    <Card class="overflow-hidden">
                        <CardHeader>
                            <CardTitle>Dog image</CardTitle>
                            <CardDescription>
                                Lipsum dolor sit amet, consectetur adipiscing elit
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div class="grid gap-2">
                                <img
                                    alt="Product image"
                                    class="aspect-square w-full rounded-md object-cover"
                                    height="300"
                                    src="https://www.shadcn-vue.com/placeholder.svg"
                                    width="300"
                                >
                                <div class="grid grid-cols-3 gap-2">
                                    <button>
                                        <img
                                            alt="Product image"
                                            class="aspect-square w-full rounded-md object-cover"
                                            height="84"
                                            src="https://www.shadcn-vue.com/placeholder.svg"
                                            width="84"
                                        >
                                    </button>
                                    <button>
                                        <img
                                            alt="Product image"
                                            class="aspect-square w-full rounded-md object-cover"
                                            height="84"
                                            src="https://www.shadcn-vue.com/placeholder.svg"
                                            width="84"
                                        >
                                    </button>
                                    <button class="flex aspect-square w-full items-center justify-center rounded-md border border-dashed">
                                        <Upload class="h-4 w-4 text-muted-foreground" />
                                        <span class="sr-only">Upload</span>
                                    </button>
                                </div>
                            </div>
                        </CardContent>
                    </Card>
                </div>
            </div>
            <div class="flex items-center justify-center gap-2 md:hidden">
                <Button variant="outline" size="sm">
                    Discard
                </Button>
                <Button size="sm">
                    Save Dog
                </Button>
            </div>
        </div>
    </main>
</template>
