<?php
include'database.php';
    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $receiver = $_POST['receiver'];
        $foodtype = $_POST['foodtype'];
        $quantity = $_POST['quantity'];

        $stmt= $conn-> prepare ("INSERT INTO requests (receiver, foodtype, quantity) VALUES (?,?,?)");
        $stmt-> bind_param("ssi",$receiver, $foodtype, $quantity);

        if($stmt->execute()){
            echo "Recorded Successfully";
        } else{
            echo "Error: ".$stmt->error;
        }
        $stmt->close();
    }
?>
<form action="request.php" method="POST">
                
    <label for="user">Receipient Name:</label>
    <input type="text" name="rname" id="user" required><br><br>
        
    <label for="type">Food Type:</label>
            <select name="food" id="type" required>
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
        <label for="other_food" id="label" style="display: none;">Please specify the food type:</label>
        <input type="text" name="other_food" id="other" placeholder="Specify food type" style="display: none; border:none;"><br>

                
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="qty" required><br><br>
                
    <input type="submit" value="Send Request">
 </form>
 <script>
            var type = document.getElementById('type');
            var otherfood = document.getElementById('other');
            var label = document.getElementById('label');

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