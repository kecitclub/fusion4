<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Food</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.html'; ?>
    <main>
       <center> <h3>Kindly fill up the form below: </h3></center> <br> <br>
        <div class="form">
            <center>
            <form action="donatedb.php" method="POST">
                <div class="row">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="pickup" required>
                </div>
                <div class="row">
                    <label for="type">Food Type:</label>
                    <select name="type" id="type" required>
                        <option>Select</option>
                        <option value="fruits">Fruits</option>
                        <option value="vegetables">Vegetables</option>
                        <option value="grains">Grains and Cereals</option>
                        <option value="dairy">Dairy Products</option>
                        <option value="baked">Baked Items</option>
                        <option value="meat">Meat</option>
                        <option value="snacks">Dry Packed Food</option>
                        <option value="prepared food">Foods Ordered from Hotels and Restro</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                
                <div class="row">
                    <label for="other_food_type" id="label" style="display: none;">Please specify the food type:</label>
                    <input type="text" name="other_food_type" id="other" placeholder="Specify food type" style="display: none;">
                </div>
                <div class="row">
                    <label for="quantity">Quantity (in KG):</label>
                    <input type="number" name="quantity" required>
                </div>
                <div class="row">
                    <label for="expiry_date">Expiry Date:</label>
                    <input type="date" name="expire" required>
                </div> <br>
                <center><div id="butn"><input type="submit" value="Donate"></div></center>
            </form>
            <center>
        </div>
        <script>
            var type = document.getElementById('type');
            var label = document.getElementById('label');
            var otherfood = document.getElementById('other');

            type.addEventListener('change', function () {
                if (type.value === 'others') {
                    otherfood.style.display = 'inline-block';
                    label.style.display = 'inline-block';
                } else {
                    otherfood.style.display = 'none';
                    label.style.display = 'none';
                    otherfood.value = '';
                }
            });
        </script>
    </main>
    <?php include 'foot.html'; ?>
</body>
</html>
