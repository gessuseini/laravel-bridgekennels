<script setup lang="ts">
import { ref } from 'vue';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Tabs,
    TabsContent,
    TabsList,
    TabsTrigger,
} from '@/components/ui/tabs';

// Reference for storing uploaded image file
const uploadedImage = ref<File | null>(null);

// Function to handle file upload
const handleFileUpload = (event: Event) => {
    const files = (event.target as HTMLInputElement).files;
    if (files && files.length > 0) {
        uploadedImage.value = files[0];
    }
};
</script>

<template>
    <main class="flex min-h-[calc(100vh - _theme(spacing.16))] flex-1 flex-col items-center gap-4 p-4 md:gap-8 md:p-10">
        <div class="mx-auto grid w-full text-center gap-2">
            <h1 class="text-3xl font-semibold">
                Account Settings
            </h1>
        </div>
        <Tabs default-value="account" class="w-full md:w-[800px]">
            <TabsList class="grid w-full grid-cols-2">
                <TabsTrigger value="account">
                    Account
                </TabsTrigger>
                <TabsTrigger value="password">
                    Password
                </TabsTrigger>
            </TabsList>
            <TabsContent value="account">
                <Card>
                    <CardHeader>
                        <CardTitle>Account</CardTitle>
                        <CardDescription>
                            Make changes to your account here. Click save when you're done.
                        </CardDescription>
                    </CardHeader>
                    <CardContent class="space-y-2">
                        <div class="space-y-1">
                            <Label for="name">Name</Label>
                            <Input id="name" default-value="Orges Useini" />
                        </div>
                        <div class="space-y-1">
                            <Label for="profileImage">Profile Image</Label>
                            <Input
                                id="profileImage"
                                type="file"
                                accept="image/*"
                                @change="handleFileUpload"
                            />
                        </div>
                    </CardContent>
                    <CardFooter>
                        <Button>Save changes</Button>
                    </CardFooter>
                </Card>
            </TabsContent>
            <TabsContent value="password">
                <Card>
                    <CardHeader>
                        <CardTitle>Password</CardTitle>
                        <CardDescription>
                            Change your password here. After saving, you'll be logged out.
                        </CardDescription>
                    </CardHeader>
                    <CardContent class="space-y-2">
                        <div class="space-y-1">
                            <Label for="current">Current password</Label>
                            <Input id="current" type="password" />
                        </div>
                        <div class="space-y-1">
                            <Label for="new">New password</Label>
                            <Input id="new" type="password" />
                        </div>
                    </CardContent>
                    <CardFooter>
                        <Button>Save password</Button>
                    </CardFooter>
                </Card>
            </TabsContent>
        </Tabs>
    </main>
</template>
