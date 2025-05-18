<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
    <!-- Loader -->
    <div id="loader" class="fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="loader"></div>
    </div>

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white py-4 px-6 mb-10 shadow-lg">
        <h1 class="text-3xl font-bold">My Portfolio</h1>
    </nav>

    <!-- Project Section -->
    <section class="container mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold mb-8">Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($projects as $project)
            <div class="bg-white rounded-lg shadow-lg p-6 hover:scale-105 transition-transform duration-300">
                <img src="/images/{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-2xl font-bold">{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
                <a href="{{ $project->link }}" target="_blank" class="text-blue-600 font-semibold mt-2 inline-block">View Project</a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Contact Form -->
    <section class="container mx-auto px-4 mb-16">
        <h2 class="text-4xl font-bold mb-8">Contact Me</h2>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">{{ session('success') }}</div>
        @endif
        <form action="/contact" method="POST" class="bg-white rounded-lg shadow-lg p-6">
            @csrf
            <label class="block mb-2 font-semibold">Name</label>
            <input type="text" name="name" class="w-full p-2 mb-4 border rounded-lg" required>
            <label class="block mb-2 font-semibold">Email</label>
            <input type="email" name="email" class="w-full p-2 mb-4 border rounded-lg" required>
            <label class="block mb-2 font-semibold">Message</label>
            <textarea name="message" rows="5" class="w-full p-2 mb-4 border rounded-lg" required></textarea>
            <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Send</button>
        </form>
    </section>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="hidden fixed bottom-8 right-8 bg-blue-600 text-white rounded-full p-4 shadow-lg hover:bg-blue-700 transition-transform duration-300">↑</button>

    <script>
        const scrollToTopBtn = document.getElementById("scrollToTop");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                scrollToTopBtn.classList.remove("hidden");
            } else {
                scrollToTopBtn.classList.add("hidden");
            }
        });

        scrollToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });

        window.addEventListener("load", () => {
            document.getElementById("loader").style.display = "none";
        });
    </script>
</body>
</html>