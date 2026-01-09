<x-layouts.auth :title="'Register ' . config('app.name')">
    <div class="lg:w-1/2 w-full">
        <div class="max-w-lg w-full p-8 mx-auto">
            <div class="flex flex-col gap-6">
                <x-auth-header :title="__('Create an account')"
                               :description="__('Enter your details below to create your account')"/>

                <!-- Session Status -->
                <x-auth-session-status class="text-center" :status="session('status')"/>

                <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
                    @csrf

                    <!-- Name -->
                    <flux:input
                        name="name"
                        :label="__('Name')"
                        :value="old('name')"
                        type="text"
                        autofocus
                        autocomplete="name"
                        :placeholder="__('Full name')"
                    />

                    <!-- Email Address -->
                    <flux:input
                        name="email"
                        :label="__('Email address')"
                        :value="old('email')"
                        type="text"
                        autocomplete="email"
                        placeholder="email@example.com"
                    />

                    <!-- Password -->
                    <flux:input
                        name="password"
                        :label="__('Password')"
                        type="password"
                        autocomplete="new-password"
                        :placeholder="__('Password')"
                        viewable
                    />

                    <!-- Confirm Password -->
                    <flux:input
                        name="password_confirmation"
                        :label="__('Confirm password')"
                        type="password"
                        autocomplete="new-password"
                        :placeholder="__('Confirm password')"
                        viewable
                    />

                    <div class="flex items-center justify-end">
                        <flux:button type="submit" variant="primary" class="w-full">
                            {{ __('Create account') }}
                        </flux:button>
                    </div>
                </form>

                <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
                    <span>{{ __('Already have an account?') }}</span>
                    <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
                </div>
            </div>
            <div>
                <div class="flex items-center gap-3 my-6 w-full">
                    <div class="flex-1 h-px bg-gray-300"></div>
                    <span class="text-sm text-gray-600 dark:text-gray-200 whitespace-nowrap">or register with</span>
                    <div class="flex-1 h-px bg-gray-300"></div>
                </div>

                <div>
                    <flux:button href="{{ route('auth.redirect', 'google') }}" class="w-full" variant="primary"
                                 color="zinc">
                        <img src="{{ asset('icons/google.svg') }}" class="max-w-6"/>
                        Google
                    </flux:button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>
