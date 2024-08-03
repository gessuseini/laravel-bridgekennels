<script setup>
import Spinner from "../../components/core/Spinner.vue";
import { computed, onMounted, ref } from "vue";
import store from "../../store";
import { SUBSCRIBERS_PER_PAGE } from "@/constants.js";

import {Table, TableBody, TableCell, TableHead, TableHeader, TableRow} from "@/components/ui/table";
// import {
//     DropdownMenu,
//     DropdownMenuContent,
//     DropdownMenuItem,
//     DropdownMenuLabel,
//     DropdownMenuTrigger
// } from "@/components/ui/dropdown-menu";
import { Button } from "@/components/ui/button";
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {TabsContent} from "@/components/ui/tabs";

const perPage = ref(SUBSCRIBERS_PER_PAGE);
const search = ref('');
const subscribers = computed(() => store.state.subscribers);

const emit = defineEmits(['clickEdit']);

onMounted(() => {
    getSubscribers();
});

function getSubscribers(url = null) {
    store.dispatch('getSubscribers', { url, search: search.value, perPage: perPage.value });
}

function deleteSubscriber(subscriber) {
    store.dispatch('deleteSubscriber', subscriber.id)
        .then(() => {
            store.dispatch('getSubscribers');
        })
        .catch((error) => {
            console.error('Failed to delete Subscriber:', error);
        });
}

// function editSubscriber(subscriber) {
//     emit('clickEdit', subscriber);
// }

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }

    getSubscribers(link.url);
}
</script>

<template>
    <TabsContent value="all">
        <Card>
            <CardHeader>
                <CardTitle>Subscribers</CardTitle>
                <CardDescription>
                    Manage and view subscribers.
                </CardDescription>
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <span class="whitespace-nowrap mr-3">Per Page</span>
                        <select @change="getSubscribers(null)" v-model="perPage" class="appearance-none relative block w-8 md:w-14 lg:w-16 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-primary focus:z-10 sm:text-sm">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <input v-model="search"
                               @change="getSubscribers(null)"
                               class="appearance-none block w-20 md:w-48 lg:w-96 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-primary focus:z-10 sm:text-sm"
                               placeholder="Type to search subscribers"
                        />
                    </div>
                </div>
            </CardHeader>
            <CardContent>
                <Spinner v-if="subscribers.loading" />
                <template v-else>
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="hidden md:table-cell">ID</TableHead>
                            <TableHead>Email</TableHead>
                            <TableHead class="hidden md:table-cell">
                                Created at
                            </TableHead>
                            <TableHead>
                                <span>Actions</span>
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="(subscriber) of subscribers.data">
                            <TableCell class="hidden md:table-cell">
                                {{ subscriber.id }}
                            </TableCell>
                            <TableCell class="font-medium">
                                {{ subscriber.email }}
                            </TableCell>
                            <TableCell class="hidden md:table-cell">
                                {{ subscriber.updated_at }}
                            </TableCell>
                            <TableCell class="md:table-cell">
                                <Button class="bg-secondary text-primary hover:bg-primary hover:text-white" @click="deleteSubscriber(subscriber)">Delete</Button>
                            </TableCell>
<!--                            <TableCell>-->
<!--                                <DropdownMenu>-->
<!--                                    <DropdownMenuTrigger as-child>-->
<!--                                        <Button-->
<!--                                            aria-haspopup="true"-->
<!--                                            size="icon"-->
<!--                                            variant="ghost"-->
<!--                                        >-->
<!--                                            <MoreHorizontal class="h-4 w-4" />-->
<!--                                            <span class="sr-only">Toggle menu</span>-->
<!--                                        </Button>-->
<!--                                    </DropdownMenuTrigger>-->
<!--                                    <DropdownMenuContent align="end">-->
<!--                                        <DropdownMenuLabel>Actions</DropdownMenuLabel>-->
<!--                                        <DropdownMenuItem @click="editSubscriber(subscriber)">Edit</DropdownMenuItem>-->
<!--                                        <DropdownMenuItem @click="deleteSubscriber(subscriber)">Delete</DropdownMenuItem>-->
<!--                                    </DropdownMenuContent>-->
<!--                                </DropdownMenu>-->
<!--                            </TableCell>-->
                        </TableRow>
                    </TableBody>
                </Table>
                </template>
            </CardContent>
            <CardFooter>
                <div class="text-xs text-muted-foreground">
                    Showing from {{ subscribers.from }} to {{ subscribers.to }}
                </div>
                <nav
                    v-if="subscribers.total > subscribers.limit"
                    class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px pl-6"
                    aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a
                        v-for="(link, i) of subscribers.links"
                        :key="i"
                        :disabled="!link.url"
                        href="#"
                        @click="getForPage($event, link)"
                        aria-current="page"
                        class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
                        :class="[
              link.active
                ? 'z-10 bg-primary text-white border-primary'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === subscribers.links.length - 1 ? 'rounded-r-md' : '',
              !link.url ? ' bg-gray-100 text-gray-700': ''
            ]"
                        v-html="link.label"
                    >
                    </a>
                </nav>
            </CardFooter>
        </Card>
    </TabsContent>
</template>

<style scoped>

</style>
