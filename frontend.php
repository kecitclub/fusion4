<?php
echo "<nav>";
echo "<a href = 'index.php'>Home</a>|";
echo "<a href = 'about.php'>About</a>|";
echo "<a href = 'contact.php'>Contact</a>|";
echo '<link rel="stylesheet" type="text/css" href="front.css">';
echo "</nav>";
echo "<hr>";

echo "<h1>Welcome to Discover Nepal</h1>";
echo "<h2>Explore the beauty of Nepal and its wonders.</h2>";

$feature_destinations = [
    ['name' => 'Kathmandu', 'description' => 'It is a religious place.', 'image' => 'kathmandu.jpg'],
    ['name' => 'Lumbini', 'description' => 'It is the birthplace of Lord Buddha.', 'image' => 'lumbini.jpg'],
    ['name' => 'Pokhara', 'description' => 'It is a beautiful city.', 'image' => 'pokhara.jpg'],
    [
        'name' => 'Chitwan',
        'description' => 'It is a place where you can see wild animals.',
        'image' => 'chitwan.jpg',
        'height' => '80%'
    ],
    
    ['name' => 'Everest', 'description' => 'It is the highest peak in the world.', 'image' => 'mt-everest.jpg']
];

echo "<h2>Featured Destinations</h2>";
echo "<div style='display: flex; flex-wrap: wrap; gap: 20px;'>";

foreach ($feature_destinations as $destination) {
    echo "<div class='destination-card'>";
    echo "<h3>{$destination['name']}</h3>";
    echo "<img src='{$destination['image']}' alt='{$destination['name']}' class='destination-image'>";
    echo "<p>{$destination['description']}</p>";
    echo "</div>";
}




echo "</div>";

$hidden_destinations  = [
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
echo "<ul style='list-style: none; padding: 0;'>";
foreach ($hidden_destinations as $destination) {
    echo "<li style='margin-bottom: 20px; text-align: center; overflow: hidden;'>"; // Text and content centered
    echo "<h3>{$destination['name']}</h3>";
    echo "<p><strong>Description:</strong> {$destination['description']}</p>";
    echo "<p><strong>Culture:</strong> {$destination['culture']}</p>";

    echo "<div style='display: inline-block; text-align: center;'>"; // Wrap images in a centered block
    foreach ($destination['images'] as $image) {
        echo "<img src='{$image}' alt='{$destination['name']}' style='display: block; margin: 10px auto; max-width: 200px; height: auto;'>"; // Center images
    }
    echo "</div>";
    echo "</li>";
}
echo "</ul>";

echo "<hr>";
?>
