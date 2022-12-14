<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="" class="mt-10">
                @csrf

                <div class="mb-6">
                    <div class="mb-6">
                        <label for="username" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Username</label>
                        <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="username" value="{{ old('name') }}" required><br>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Email</label>
                        <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ old('email') }}" required><br>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Password</label>
                        <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required><br>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-500" type="submit">Submit</button>
                    </div>


                </div>

            </form>
        </main>
    </section>
</x-layout>
