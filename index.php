<?php

$videos = [
    [
        "title" => "The Last Journey",
        "year" => "2025",
        "duration" => "52 min",
        "thumbnail" => "https://picsum.photos/800/450?1"
    ],
    [
        "title" => "Archive Collection",
        "year" => "2024",
        "duration" => "38 min",
        "thumbnail" => "https://picsum.photos/800/450?2"
    ],
    [
        "title" => "Historical Footage",
        "year" => "2023",
        "duration" => "1h 12m",
        "thumbnail" => "https://picsum.photos/800/450?3"
    ],
    [
        "title" => "Oral Histories",
        "year" => "2025",
        "duration" => "47 min",
        "thumbnail" => "https://picsum.photos/800/450?4"
    ],
    [
        "title" => "Documentary Series",
        "year" => "2022",
        "duration" => "56 min",
        "thumbnail" => "https://picsum.photos/800/450?5"
    ],
    [
        "title" => "Community Records",
        "year" => "2021",
        "duration" => "34 min",
        "thumbnail" => "https://picsum.photos/800/450?6"
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Digital Archive</title>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<style>
body{
    background:#000;
}

.hide-scrollbar{
    scrollbar-width:none;
}

.hide-scrollbar::-webkit-scrollbar{
    display:none;
}
</style>

</head>

<body class="bg-black text-white">

<!-- NAV -->

<header class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-b from-black/90 to-transparent">

    <div class="px-6 lg:px-12 h-16 flex items-center justify-between">

        <h1 class="font-semibold tracking-wide text-lg">
            DIGITAL ARCHIVE
        </h1>

        <input
            type="search"
            placeholder="Search"
            class="bg-white/10 backdrop-blur px-4 py-2 rounded-full text-sm outline-none border border-white/10"
        >

    </div>

</header>

<!-- HERO -->

<section
    class="relative h-[80vh] flex items-end"
    style="
        background-image:
        linear-gradient(to top,#000 10%,transparent 60%),
        url('https://picsum.photos/1920/1080');
        background-size:cover;
        background-position:center;
    "
>

    <div class="px-6 lg:px-12 pb-24 max-w-2xl">

        <div class="text-xs uppercase tracking-[0.25em] text-zinc-400 mb-4">
            Featured Collection
        </div>

        <h2 class="text-5xl md:text-7xl font-bold mb-4">
            Digital Memory
        </h2>

        <p class="text-zinc-300 text-lg leading-relaxed mb-8">
            A curated archive of recordings, documentaries,
            interviews, events and historical material.
        </p>

        <button
            class="bg-white text-black px-8 py-3 rounded-full font-medium hover:opacity-90 transition"
        >
            Browse Collection
        </button>

    </div>

</section>

<!-- ROW -->

<section class="px-6 lg:px-12 pb-16">

    <h3 class="text-xl font-semibold mb-5">
        Recently Added
    </h3>

    <div class="flex gap-4 overflow-x-auto hide-scrollbar pb-4">

        <?php foreach($videos as $video): ?>

        <div
            class="group shrink-0 w-72 transition duration-300 hover:scale-105"
        >

            <div class="overflow-hidden rounded-2xl">

                <img
                    src="<?= $video['thumbnail']; ?>"
                    alt=""
                    class="w-full aspect-video object-cover"
                >

            </div>

            <div class="pt-3">

                <h4 class="font-medium">
                    <?= $video['title']; ?>
                </h4>

                <div class="text-sm text-zinc-500 mt-1">
                    <?= $video['year']; ?>
                    •
                    <?= $video['duration']; ?>
                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</section>

<!-- SECOND ROW -->

<section class="px-6 lg:px-12 pb-20">

    <h3 class="text-xl font-semibold mb-5">
        Documentary Collection
    </h3>

    <div class="flex gap-4 overflow-x-auto hide-scrollbar pb-4">

        <?php foreach($videos as $video): ?>

        <div
            class="group shrink-0 w-72 transition duration-300 hover:scale-105"
        >

            <div class="overflow-hidden rounded-2xl">

                <img
                    src="<?= $video['thumbnail']; ?>"
                    alt=""
                    class="w-full aspect-video object-cover"
                >

            </div>

            <div class="pt-3">

                <h4 class="font-medium">
                    <?= $video['title']; ?>
                </h4>

                <div class="text-sm text-zinc-500 mt-1">
                    <?= $video['year']; ?>
                    •
                    <?= $video['duration']; ?>
                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</section>

</body>
</html>
