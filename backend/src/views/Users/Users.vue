<script setup lang="ts">
import {ref} from "vue";
import store from "../../store/index.js";
import UserModal from "./UserModal.vue";
import UsersTable from "./UsersTable.vue";

import { Tabs } from "@/components/ui/tabs";
import { Button } from '@/components/ui/button'

import {
    PlusCircle,
} from 'lucide-vue-next'


const DEFAULT_USER = {
    id: '',
    name: '',
    email: ''
}

const showModal = ref(false);
const userModal = ref( {
    id: '',
    name: '',
    email: '',
})

function editUser(user) {
    store.dispatch('getSpecificUser', user.id)
        .then(({data}) => {
            userModal.value = data;
            showUserModal();
        })
}

function showUserModal(){
    showModal.value = true;
}

function onModalClose() {
    userModal.value = {...DEFAULT_USER}
}
</script>

<template>
    <main class="grid flex-1 items-start gap-4 p-4 sm:px-6 sm:py-0 md:gap-8">
        <Tabs default-value="all">
            <div class="flex items-center">
                <div class="ml-auto flex items-center gap-2">
                    <!--                    Filter after database integration-->
                    <!--                    <DropdownMenu>-->
                    <!--                        <DropdownMenuTrigger as-child>-->
                    <!--                            <Button variant="outline" size="sm" class="h-7 gap-1">-->
                    <!--                                <ListFilter class="h-3.5 w-3.5" />-->
                    <!--                                <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">-->
                    <!--                      Filter-->
                    <!--                    </span>-->
                    <!--                            </Button>-->
                    <!--                        </DropdownMenuTrigger>-->
                    <!--                        <DropdownMenuContent align="end">-->
                    <!--                            <DropdownMenuLabel>Filter by</DropdownMenuLabel>-->
                    <!--                            <DropdownMenuSeparator />-->
                    <!--                            <DropdownMenuItem checked>-->
                    <!--                                Active-->
                    <!--                            </DropdownMenuItem>-->
                    <!--                            <DropdownMenuItem>Draft</DropdownMenuItem>-->
                    <!--                            <DropdownMenuItem>-->
                    <!--                                Archived-->
                    <!--                            </DropdownMenuItem>-->
                    <!--                        </DropdownMenuContent>-->
                    <!--                    </DropdownMenu>-->
                    <!--                    <Button size="sm" variant="outline" class="h-7 gap-1">-->
                    <!--                        <File class="h-3.5 w-3.5" />-->
                    <!--                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">-->
                    <!--                  Export-->
                    <!--                </span>-->
                    <!--                    </Button>-->
                    <Button @click="showUserModal()" size="sm" class="h-7 gap-1">
                        <PlusCircle class="h-3.5 w-3.5" />
                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">
                  Add User
                </span>
                    </Button>
                </div>
            </div>
            <UserModal v-model="showModal" :user="userModal" @close="onModalClose" />
            <UsersTable @clickEdit="editUser" />
        </Tabs>
    </main>
</template>

<style scoped>

</style>
