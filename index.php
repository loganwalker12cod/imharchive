<?php

$albums = [
    [
        "title" => "Muharram 1448H",
        "videos" => [
            [
                "id" => 1,
                "title" => "Muharram 1",
                "year" => "1446H",
                "duration" => "52 min",
                "thumbnail" => "thumbs/thumbnail1.png",
                "video" => "M3kJAvPLXcg",
                "description" => "Majlis, Muharram 1, 1448H at IMH"
            ],
            [
                "id" => 2,
                "title" => "Muharram 2",
                "year" => "1446H",
                "duration" => "61 min",
                "thumbnail" => "thumbs/thumbnail2.png",
                "video" => "1sDzOpWsBC8",
                "description" => "Majlis, Muharram 2, 1448H at IMH"
            ],
            [
                "id" => 3,
                "title" => "Muharram 3",
                "year" => "1446H",
                "duration" => "71 min",
                "thumbnail" => "thumbs/thumbnail3.png",
                "video" => "2B_ymcg5ZUM",
                "description" => "Majlis, Muharram 3, 1448H at IMH"
            ],
            [
                "id" => 4,
                "title" => "Muharram 4",
                "year" => "1446H",
                "duration" => "85 min",
                "thumbnail" => "thumbs/thumbnail4.png",
                "video" => "Ebl9ul5z8Do",
                "description" => "Majlis, Muharram 4, 1448H at IMH"
            ],
            [
                "id" => 5,
                "title" => "Muharram 5",
                "year" => "1446H",
                "duration" => "85 min",
                "thumbnail" => "thumbs/thumbnail5.png",
                "video" => "MGOIzMN__Ug",
                "description" => "Majlis, Muharram 5, 1448H at IMH"
            ],
            [
                "id" => 6,
                "title" => "Muharram 6",
                "year" => "1446H",
                "duration" => "85 min",
                "thumbnail" => "thumbs/thumbnail6.png",
                "video" => "YH42Ws6PRrA",
                "description" => "Majlis, Muharram 6, 1448H at IMH"
            ],
            [
                "id" => 7,
                "title" => "Muharram 7",
                "year" => "1446H",
                "duration" => "85 min",
                "thumbnail" => "thumbs/thumbnail7.png",
                "video" => "ec4woP0yBeg",
                "description" => "Majlis, Muharram 7, 1448H at IMH"
            ],
            [
                "id" => 8,
                "title" => "Muharram 8",
                "year" => "1446H",
                "duration" => "85 min",
                "thumbnail" => "thumbs/thumbnail8.png",
                "video" => "GVwndIr1Ny8",
                "description" => "Majlis, Muharram 8, 1448H at IMH"
            ],
            [
                "id" => 9,
                "title" => "Muharram 9",
                "year" => "1446H",
                "duration" => "85 min",
                "thumbnail" => "thumbs/thumbnail9.png",
                "video" => "kFxAf6I9R-Y",
                "description" => "Majlis, Muharram 9, 1448H at IMH"
            ],
        ]
    ],
];

$videoId = (int)($_GET['v'] ?? 0);
$search = trim($_GET['q'] ?? '');

$currentVideo = null;

foreach ($albums as $album) {
    foreach ($album['videos'] as $video) {
        if ($video['id'] === $videoId) {
            $currentVideo = $video;
            break 2;
        }
    }
}

if ($currentVideo):
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= htmlspecialchars($currentVideo['title']) ?></title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-black text-white min-h-screen">

<div class="max-w-7xl mx-auto p-6 lg:p-10">

<a href="?" class="inline-block mb-8 text-zinc-400 hover:text-white transition">
Back
</a>

<!-- <video
controls
autoplay
class="w-full rounded-3xl bg-black"
>
<source src="<?= htmlspecialchars($currentVideo['video']) ?>" type="video/mp4">
</video> -->
<!-- style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;" -->
<div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
    <iframe src="https://www.youtube.com/embed/<?= htmlspecialchars($currentVideo['video']) ?>?rel=0" style="top: 0; left: 0; width: 100%; height: 100%; position: absolute; border: 0;" allowfullscreen scrolling="no" allow="accelerometer *; clipboard-write *; encrypted-media *; gyroscope *; picture-in-picture *; web-share *;" referrerpolicy="strict-origin">
    </iframe>
</div>

<div class="mt-8">
<h1 class="text-4xl font-bold">
<?= htmlspecialchars($currentVideo['title']) ?>
</h1>

<div class="mt-3 text-zinc-500">
<?= htmlspecialchars($currentVideo['year']) ?>
•
<?= htmlspecialchars($currentVideo['duration']) ?>
</div>

<p class="mt-6 text-zinc-300 max-w-3xl">
<?= htmlspecialchars($currentVideo['description']) ?>
</p>

</div>

</div>

</body>
</html>

<?php
exit;
endif;

if ($search !== '') {

    $filteredAlbums = [];

    foreach ($albums as $album) {

        $matches = [];

        foreach ($album['videos'] as $video) {

            if (
                stripos($video['title'], $search) !== false ||
                stripos($video['description'], $search) !== false ||
                stripos($album['title'], $search) !== false
            ) {
                $matches[] = $video;
            }
        }

        if (count($matches)) {
            $album['videos'] = $matches;
            $filteredAlbums[] = $album;
        }
    }

    $albums = $filteredAlbums;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>IMH Archive</title>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<style>
body{
background:#000;
}

.scrollbar-none{
scrollbar-width:none;
}

.scrollbar-none::-webkit-scrollbar{
display:none;
}
</style>

</head>

<body class="bg-black text-white">

<header class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-b from-black via-black/90 to-transparent">

<div class="h-16 px-6 lg:px-12 flex items-center justify-between">

<div class="font-semibold tracking-wider">
IMH ARCHIVE
</div>

<form method="get">
<input
name="q"
value="<?= htmlspecialchars($search) ?>"
type="search"
placeholder="Search"
class="bg-white/10 border border-white/10 rounded-full px-4 py-2 text-sm outline-none"
/>
</form>

</div>

</header>

<section
class="h-[85vh] flex items-end"
style="
background-image:
linear-gradient(to top,#000 5%,transparent 60%),
url('thumbs/thumbnail-playlist.png');
background-size:cover;
background-position:center;
"
>

<div class="px-6 lg:px-12 pb-24 max-w-3xl">

<div class="uppercase tracking-[0.3em] text-sm text-white-300 mb-4">
Featured Majlis Collection
</div>

<h1 class="text-5xl md:text-7xl font-bold mb-6">
Muharram 1448H
</h1>

<p class="text-zinc-300 text-lg leading-relaxed">
Live Daily Majalis directly from the Imambada Mehdi Hussain Sb.
</p>

</div>

</section>

<?php foreach($albums as $album): ?>

<section class="px-6 lg:px-12 pb-20">

<h2 class="text-2xl font-semibold mb-6">
<?= htmlspecialchars($album['title']) ?>
</h2>

<div class="flex gap-5 overflow-x-auto scrollbar-none pb-4">

<?php foreach($album['videos'] as $video): ?>

<a
href="?v=<?= $video['id'] ?>"
class="group shrink-0 w-80"
>

<div class="relative overflow-hidden rounded-3xl">

<img
src="<?= htmlspecialchars($video['thumbnail']) ?>"
class="aspect-video w-full object-cover transition duration-500 group-hover:scale-105"
>

<div class="absolute inset-0 bg-black/10 group-hover:bg-black/30 transition"></div>

<div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">

<div class="w-16 h-16 rounded-full bg-white text-black flex items-center justify-center text-xl">
▶
</div>

</div>

</div>

<div class="pt-4">

<div class="font-medium text-lg">
<?= htmlspecialchars($video['title']) ?>
</div>

<div class="text-sm text-zinc-500 mt-1">
<?= htmlspecialchars($video['year']) ?>
•
<?= htmlspecialchars($video['duration']) ?>
</div>

</div>

</a>

<?php endforeach; ?>

</div>

</section>

<?php endforeach; ?>

</body>
</html>
