<script setup lang="ts">
import TeamMembersTable from "./TeamMembersTable.vue";
import TeamMemberModal from "./TeamMemberModal.vue";
import { ref } from "vue";
import store from "../../store/index.js";

const DEFAULT_TEAM_MEMBER = {
    id: '',
    member_name: '',
    member_image: '',
    member_role: '',
    member_facebook: '',
    member_twitter: '',
    member_linkedin: '',
    member_google_plus: ''
};

const showModal = ref(false);
const team_memberModal = ref({
    id: '',
    member_name: '',
    member_image: '',
    member_role: '',
    member_facebook: '',
    member_twitter: '',
    member_linkedin: '',
    member_google_plus: '',
});

function editTeamMember(team_member) {
    store.dispatch('getTeamMember', team_member.id)
        .then(({ data }) => {
            team_memberModal.value = data;
            showTeamMemberModal();
        })
        .catch((error) => {
            console.error('Error fetching Team Member:', error);
        });
}

function showTeamMemberModal() {
    showModal.value = true;
}

function onModalClose() {
    team_memberModal.value = { ...DEFAULT_TEAM_MEMBER };
}

import {
    PlusCircle,
} from 'lucide-vue-next'

import { Tabs } from '@/components/ui/tabs'
import { Button } from '@/components/ui/button'
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
                    <Button @click="showTeamMemberModal()" size="sm" class="h-7 gap-1">
                        <PlusCircle class="h-3.5 w-3.5" />
                        <span class="sr-only sm:not-sr-only sm:whitespace-nowrap">
                  Add Team Member
                </span>
                    </Button>
                </div>
            </div>
            <TeamMemberModal v-model="showModal" :team_member="team_memberModal" @close="onModalClose" />
            <TeamMembersTable @clickEdit="editTeamMember" />
        </Tabs>
    </main>
</template>

<style scoped>

</style>
