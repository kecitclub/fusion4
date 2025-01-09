<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation</title>
</head>
<body>
    <h2>Donate Your Excess Food Here</h2>
    <form action="donation.php" method="POST">
                
        <label for="location">Location:</label>
        <input type="text" name="location" required><br><br>

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
            <br>
        <label for="other_food_type" id="label" style="display: none;">Please specify the food type:</label>
        <input type="text" name="other_food_type" id="other" placeholder="Specify food type" style="display: none; border:none;"><br>
        
        <label for="quantity">Quantity (in KG):</label>
        <input type="number" name="quantity" required><br><br>
        
        <label for="expiry_date">Expiry Date:</label>
        <input type="date" name="expiry_date" required><br><br>

        <input type="submit" value="Donate">
    </form>
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
            }
        });
    </script>
</body>

</html>
