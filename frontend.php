<?php
echo "<nav>";
echo "<a href = 'index.php'>Home</a>|";
echo "<a href = 'about.php'>About</a>|";
echo "<a href = 'contact.php'>Contact</a>|";
echo "</nav>";
echo "<hr>";

echo "<h1>Welcome to Discover Nepal</h1>";
echo "<p>Explore the beauty of Nepal and its wonders.</p>";

$feature_destinations = [
    ['name' => 'Kathmandu', 'description' => 'It is a religious place.', 'image' => 'kathmandu.jpg'],
    ['name' => 'Lumbini', 'description' => 'It is the birthplace of Lord Buddha.', 'image' => 'lumbini.jpg'],
    ['name' => 'Pokhara', 'description' => 'It is a beautiful city.', 'image' => 'pokhara.jpg'],
    ['name' => 'Chitwan', 'description' => 'It is a place where you can see wild animals.', 'image' => 'chitwan.jpg'],
    ['name' => 'Everest', 'description' => 'It is the highest peak in the world.', 'image' => 'mt-everest.jpg']
];

echo "<h2>Featured Destinations</h2>";
echo "<div style='display: flex; flex-wrap: wrap; gap: 20px;'>";

foreach ($feature_destinations as $destination) {
    echo "<div style='border: 1px solid #333; padding: 10px; width: 200px; text-align: center;'>";
    echo "<h3>{$destination['name']}</h3>";
    echo "<img src='{$destination['image']}' alt='{$destination['name']}' style='width: 100%; height: auto;'><br>";
    echo "<p>{$destination['description']}</p>";
    echo "</div>";
}

echo "</div>";

$hidden_destinations = [
    [
        'name' => 'Manang',
        'description' => 'Manang is a beautiful valley surrounded by snow-capped peaks.',
        'images' => ['manang.jpg', 'manang-2.jpg'],
        'culture' => 'Rich in Tibetan culture, a hub for trekkers heading to the Annapurna Circuit.'
    ],
    [
        'name' => 'Mustang',
        'description' => 'Mustang is known for its ancient monasteries and a striking landscape resembling the Tibetan Plateau.',
        'images' => ['mustang.jpg', 'mustang-2.jpg'],
        'culture' => 'The region has a unique Tibetan-influenced culture, with various festivals and rituals.'
    ],
    [
        'name' => 'Rolpa',
        'description' => 'Rolpa is a quiet district known for its natural beauty and remote charm.',
        'images' => ['rolpa.jpg', 'ropla-2.jpg'],
        'culture' => 'Rolpa is home to the Tharu and Magar ethnic communities, with rich folklore and traditions.'
    ],
    [
        'name' => 'Dolpa',
        'description' => 'Dolpa is famous for its remote trekking routes and pristine landscapes.',
        'images' => ['dolpa.jpg', 'dolpa-2.jpg'],
        'culture' => 'Dolpa has a strong Tibetan culture, and is known for its monasteries and unique architecture.'
    ],
    [
        'name' => 'Mugu',
        'description' => 'Mugu is a district with one of Nepal’s most untouched natural environments, known for its trekking trails.',
        'images' => ['mugu.jpg', 'mugu-2.jpg'],
        'culture' => 'The people of Mugu mainly follow the Bon religion, and the region has a unique way of life.'
    ]
];

echo "<h2>Hidden Destinations</h2>";
echo "<ul>";
foreach ($hidden_destinations as $destination) {
    echo "<li>";
    echo "<h3>{$destination['name']}</h3>";
    echo "<strong>Description:</strong> {$destination['description']}<br>";
    echo "<strong>Culture:</strong> {$destination['culture']}<br>";

    echo "<div class='images'>";
    foreach ($destination['images'] as $image) {
        echo "<img src='{$image}' alt='{$destination['name']}' style='width: 200px; height: auto; margin-right: 10px;'><br>";
    }
    echo "</div>";
    echo "</li>";
}
echo "</ul>";
echo "<hr>";
?>
