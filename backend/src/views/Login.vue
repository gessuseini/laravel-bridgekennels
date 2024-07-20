<script setup lang="ts">
import {ref} from 'vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import GuestLayout from "../components/GuestLayout.vue";
import store from "../store";
import {useRouter} from "vue-router";

const router = useRouter();

let loading = ref(false);
let errorMsg = ref("");

const user = {
    email: '',
    password: '',
    remember: false
}

function login() {
    loading.value = true;
    store.dispatch('login', user)
        .then(() => {
            loading.value = false;
            router.push({name: 'app.dashboard'})
        })
        .catch(({response}) => {
            loading.value = false;
            errorMsg.value = response.data.message;
        })
}

</script>

<template>
    <GuestLayout>
    <Card class="mx-auto max-w-sm">
        <form class="space-y-6" method="POST" @submit.prevent="login">
            <div v-if="errorMsg" class="flex items-center justify-center py-3 px-5 bg-red-500 text-white rounded">
                {{errorMsg}}
            </div>
        <CardHeader>
            <CardTitle class="text-2xl">
                Login
            </CardTitle>
            <CardDescription>
                Enter your email below to login to your account
            </CardDescription>
        </CardHeader>
        <CardContent>
            <div class="grid gap-4">
                <div class="grid gap-2">
                    <Label for="email">Email</Label>
                    <Input
                        id="email"
                        name="email"
                        type="email"
                        autocomplete="email"
                        required=""
                        v-model="user.email"
                    />
                </div>
                <div class="grid gap-2">
                    <div class="flex items-center">
                        <Label for="password">Password</Label>
                    </div>
                    <Input  id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required=""
                            v-model="user.password" />
                </div>
                <Button class="w-full"
                        type="submit"
                        :disabled="loading">
                    <svg v-if="loading" class="animate-spin mr-3 mt-0.5 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>Login
                </Button>
            </div>
            <div class="mt-4 text-center text-sm">
                <router-link
                    :to="{ name: 'request-password' }"
                    class="ml-auto inline-block text-sm underline"
                >Forgot password?</router-link>
            </div>
        </CardContent>
        </form>
    </Card>
    </GuestLayout>
</template>
