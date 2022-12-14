<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center justify-right">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button  class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</button>
                        </x-slot>
                        <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts/create')">
                            All posts
                        </x-dropdown-item>
                        <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">
                            New Posts
                        </x-dropdown-item>

                    </x-dropdown>
                    <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-6">Log-in</a>
                @endauth



            </div>
        </nav>


        {{ $slot }}


        <footer id="newletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>


                        </div>


                    </form>
                </div>
            </div>
        </footer>

    </section>
    <x-flash/>

</body>
