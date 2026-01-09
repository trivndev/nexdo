<flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

    <flux:brand href="{{ route('home') }}" name="{{ config('app.name') }}"
                class="max-lg:hidden dark:hidden *:text-lg!" wire:navigate/>
    <flux:brand href="{{ route('home') }}"
                name="{{ config('app.name') }}"
                class="max-lg:hidden! hidden dark:flex *:text-lg!" wire:navigate/>

    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item icon="clipboard-document-list" :href="route('todolists')" wire:navigate>Todolist</flux:navbar.item>
    </flux:navbar>

    <flux:spacer/>
    <flux:navbar class="me-4">
        <flux:dropdown x-data align="end">
            <flux:button variant="subtle" square class="group" aria-label="Preferred color scheme">
                <flux:icon.sun x-show="$flux.appearance === 'light'" variant="mini"
                               class="text-zinc-500 dark:text-white"/>
                <flux:icon.moon x-show="$flux.appearance === 'dark'" variant="mini"
                                class="text-zinc-500 dark:text-white"/>
                <flux:icon.computer-desktop x-show="$flux.appearance === 'system' && $flux.dark" variant="mini"/>
                <flux:icon.computer-desktop x-show="$flux.appearance === 'system' && ! $flux.dark" variant="mini"/>
            </flux:button>

            <flux:menu>
                <flux:menu.item icon="sun" x-on:click="$flux.appearance = 'light'">Light</flux:menu.item>
                <flux:menu.item icon="moon" x-on:click="$flux.appearance = 'dark'">Dark</flux:menu.item>
                <flux:menu.item icon="computer-desktop" x-on:click="$flux.appearance = 'system'">System
                </flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:navbar>

    @if($user)
        <flux:dropdown position="top" align="start">
            <flux:profile :name="$user->name"/>


            <flux:menu>
                <flux:navlist.item icon="cog-6-tooth" icon:variant="outline" :href="route('profile.edit')" :current="request()->is('settings/*')" wire:navigate>
                    Settings
                </flux:navlist.item>
                <flux:menu.separator/>

                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <flux:menu.item icon="arrow-right-start-on-rectangle" type="submit">Logout</flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    @else
        <flux:button variant="primary" :href="route('login')" wire:navigate>
            Login
        </flux:button>
    @endif
</flux:header>


<flux:sidebar sticky collapsible="mobile"
              class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.header>
        <flux:sidebar.brand
            :href="route('home')"
            logo=""
            :name="config('app.name')"
            wire:navigate
        />

        <flux:sidebar.collapse
            class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2"/>
    </flux:sidebar.header>

    <flux:sidebar.nav>
        <flux:sidebar.item icon="clipboard-document-list" :href="route('todolists')" wire:navigate>Todolist</flux:sidebar.item>
    </flux:sidebar.nav>

    <flux:sidebar.spacer/>

    <flux:sidebar.nav>
        <flux:sidebar.item icon="cog-6-tooth" :href="route('profile.edit')" wire:navigate>Settings</flux:sidebar.item>
    </flux:sidebar.nav>
</flux:sidebar>
