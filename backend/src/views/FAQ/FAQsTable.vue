<script setup>
import Spinner from "../../components/core/Spinner.vue";
import { computed, onMounted, ref } from "vue";
import store from "../../store";
import { FAQS_PER_PAGE } from "@/constants.js";

import {MoreHorizontal} from "lucide-vue-next";
import {Table, TableBody, TableCell, TableHead, TableHeader, TableRow} from "@/components/ui/table";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuTrigger
} from "@/components/ui/dropdown-menu";
import { Button } from "@/components/ui/button";
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {TabsContent} from "@/components/ui/tabs";

const perPage = ref(FAQS_PER_PAGE);
const search = ref('');
const faqs = computed(() => store.state.faqs);

const emit = defineEmits(['clickEdit']);

onMounted(() => {
    getFAQs();
});

function getFAQs(url = null) {
    store.dispatch('getFAQs', { url, search: search.value, perPage: perPage.value });
}

function deleteFAQ(faq) {
    store.dispatch('deleteFAQ', faq.id)
        .then(() => {
            store.dispatch('getFAQs');
        })
        .catch((error) => {
            console.error('Failed to delete FAQ:', error);
        });
}

function editFAQ(faq) {
    emit('clickEdit', faq);
}

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }

    getFAQs(link.url);
}
</script>

<template>
    <TabsContent value="all">
        <Card>
            <CardHeader>
                <CardTitle>FAQs</CardTitle>
                <CardDescription>
                    Manage and view frequently asked questions.
                </CardDescription>
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <span class="whitespace-nowrap mr-3">Per Page</span>
                        <select @change="getFAQs(null)" v-model="perPage" class="appearance-none relative block w-8 md:w-14 lg:w-16 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-primary focus:z-10 sm:text-sm">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <input v-model="search"
                               @change="getFAQs(null)"
                               class="appearance-none block w-20 md:w-48 lg:w-96 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-primary focus:z-10 sm:text-sm"
                               placeholder="Type to search faqs"
                        />
                    </div>
                </div>
            </CardHeader>
            <CardContent>
                <Spinner v-if="faqs.loading" />
                <template v-else>
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>ID</TableHead>
                            <TableHead>Question</TableHead>
                            <TableHead class="hidden md:table-cell">Answer</TableHead>
                            <TableHead class="hidden md:table-cell">
                                Created at
                            </TableHead>
                            <TableHead>
                                <span class="sr-only">Actions</span>
                            </TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="(faq, index) of faqs.data">
                            <TableCell>
                                {{ faq.id }}
                            </TableCell>
                            <TableCell class="font-medium">
                                {{ faq.question }}
                            </TableCell>
                            <TableCell class="hidden md:table-cell">
                                {{ faq.answer }}
                            </TableCell>
                            <TableCell class="hidden md:table-cell">
                                {{ faq.updated_at }}
                            </TableCell>
                            <TableCell>
                                <DropdownMenu>
                                    <DropdownMenuTrigger as-child>
                                        <Button
                                            aria-haspopup="true"
                                            size="icon"
                                            variant="ghost"
                                        >
                                            <MoreHorizontal class="h-4 w-4" />
                                            <span class="sr-only">Toggle menu</span>
                                        </Button>
                                    </DropdownMenuTrigger>
                                    <DropdownMenuContent align="end">
                                        <DropdownMenuLabel>Actions</DropdownMenuLabel>
                                        <DropdownMenuItem @click="editFAQ(faq)">Edit</DropdownMenuItem>
                                        <DropdownMenuItem @click="deleteFAQ(faq)">Delete</DropdownMenuItem>
                                    </DropdownMenuContent>
                                </DropdownMenu>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
                </template>
            </CardContent>
            <CardFooter>
                <div class="text-xs text-muted-foreground">
                    Showing from {{ faqs.from }} to {{ faqs.to }}
                </div>
                <nav
                    v-if="faqs.total > faqs.limit"
                    class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px pl-6"
                    aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a
                        v-for="(link, i) of faqs.links"
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
              i === faqs.links.length - 1 ? 'rounded-r-md' : '',
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
