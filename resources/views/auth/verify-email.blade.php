<x-guest-layout>
    <div class="flex items-center min-h-fit padding-top-70 padding-bottom-70 sm:bg-white md:bg-gray-50 lg:bg-gray-50">
        <div class="flex-1 h-full max-w-2xl mx-auto bg-white rounded-2xl lg:shadow-xl md:shadow-xl">
            <div class="flex items-center justify-center p-6 sm:p-12">
                <div class="w-full">
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Thank you for registering! Before you get started, you can verify your email address by clicking on the link we just emailed you. If you haven\'t received the email, we can resend it to you.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-primary-button>
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" style="text-decoration: none;" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
