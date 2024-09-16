<main class="bg-gray-50 pt-6 h-[90vh]">
    <?php
//        $servername = "127.0.0.1:3306";
//        $username = 'root';
//        $password = '@21Nov2004';
//        $database = 'ClientDetailsDB';
//
//        $conn = mysqli_connect($servername, $username, $password, $database);
//
//        if (!$conn){
//            echo "error";
//        }

        $existSql = "SELECT * FROM Details WHERE id = $id;";
        $result1 = mysqli_query($conn, $existSql);
    ?>
    <?php foreach ($result1 as $item) : ?>
        <div class="flex flex-wrap">
            <div class="product-image">
                <img src="<?= $item['image']?>" alt="Product Image" class="w-[400px] border-8 border-gray-300 rounded-md p-2 bg-white mt-2 ml-[5rem]">
            </div>
            <div class="product-details max-w-[37rem] mt-6 ml-[2rem] flex-1 text-xl">
                <p class="quote mt-2 mb-2"><strong>Owner Name: </strong><?= $item['owner_name']?></p>
                <p class="quote mt-2 mb-2"><strong>Owner Contact: </strong><?= $item['owner_contact']?></p>
                <p class="quote mt-2 mb-2"><strong>Location: </strong><?= $item['location']?></p>
                <p class="quote mt-2 mb-2"><strong>Google Map: </strong><a href="<?= $item['google_location']?>">Visit Location on Google Map</a></p>
                <p class="quote mt-2 mb-2"><strong>Description: </strong><?= $item['description']?></p>
                <p class="quote mt-2 mb-2"><strong>Size: </strong><?= $item['size']?> sq.ft</p>
                <p class="quote mt-2 mb-2"><strong>Price: </strong>Rs. <?= $item['price']?></p>
                <p class="quote mt-2 mb-2"><strong>Type: </strong><?= strtoupper($item['type'])?></p>
                <p class="quote mt-2 mb-2"><strong>Rooms: </strong><?= strtoupper($item['rooms'])?></p>
            </div>
        </div>
    <?php endforeach;?>
</main>
