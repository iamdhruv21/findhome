<?php
//    $servername = "127.0.0.1:3306";
//    $username = 'root';
//    $password = '@21Nov2004';
//    $database = 'ClientDetailsDB';
//
//    $conn = mysqli_connect($servername, $username, $password, $database);
//
//    if (!$conn){
//        echo "error";
//    }

    $name = $_SESSION['username'];
    $existSql1 = "SELECT * FROM Clients WHERE name = '$name';";
    $result1 = mysqli_query($conn, $existSql1);
$id = 0;
if (mysqli_num_rows($result1)) {
    while($user = mysqli_fetch_assoc($result1)) {
        $id = $user['id'];
    }
}

    $existSql2 = "SELECT * FROM Details WHERE client_id = $id;";
    $result2 = mysqli_query($conn, $existSql2);
?>

<div id="main" class="w-full h-[90vh] lg:px-6 px-4 py-4 bg-gray-50">
    <h2 class="text-2xl text-center md:text-3xl lg:text-4xl font-bold">Welcome, <?= $name?></h2>
    <div class="pt-4 flex items-center justify-between lg:mr-14">
        <h2 class="text-xl align-bottom lg:text-2xl font-bold">Previous Added: </h2>
        <button class="px-4 py-2 bg-[#2a2a2a] hover:bg-black text-white rounded-3xl" id="show">+ Add</button>
    </div>

    <div id="grid" class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-4 md:mx-8 lg:px-4 py-4">
        <?php foreach ($result2 as $item) : ?>
            <div class="card2">
                <div class="img w-full">
                    <img src="<?= $item['image']?>" alt="image" class="w-full h-[200px] md:h-[210px] lg:h-[234px]">
                </div>
                <div class="detail md:px-2 px-1">
                    <h4 class="font-bold lg:my-2 md:text-xl"><?= $item['location']?></h4>
                    <p class="mb-2 text-[1rem] md:text-[1rem] lg:text-lg"><?= $item['description']?></p>
                    <div class="md:my-2">
                        <span><?= strtoupper($item['type'])?></span>
                        <span><?= strtoupper($item['rooms'])?></span>
                    </div>
                    <form action="/dashboard" method="post">
                        <input type="hidden" name="id" value="<?=$item['id']?>">
                        <button class="del" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<div class="absolute top-0 w-full h-screen bg-[#161515e0] z-10 hidden" id="toggle">
    <div class="bg-white lg:w-[35%] h-[95vh] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <form action="/create" method="post">
            <div class="px-4 py-6">
                <h2 class="text-center text-3xl font-bold">Add New Property</h2>
                <div class="flex justify-between my-4">
                    <div class="">
                        <label class="font-bold">Owner Name:
                            <input type="text" placeholder="E.g: John Smith" class="border border-black px-2 font-medium" name="ownerName">
                        </label>
                    </div>
                    <div class="">
                        <label class="font-bold">Owner Contact:
                            <input type="text" placeholder="E.g: 626*****23"  class="border border-black px-2 font-medium" name="ownerContact">
                        </label>
                    </div>
                </div>
                <div class="flex justify-between my-4">
                    <div class="">
                        <label class="font-bold">Price:
                            <input type="text" placeholder="13,000"  class="border border-black px-2 font-medium" name="price">
                        </label>
                    </div>
                    <div class="lg:ml-[2.5rem]">
                        <label class="font-bold">Size(in sq.ft)
                            <input type="text" placeholder="1200 sq.ft"  class="border border-black px-2 font-medium" name="size">
                        </label>
                    </div>
                </div>

                <div class="flex justify-between my-4">
                    <label class="font-bold">Image:
                        <input type="text" placeholder="Image Name"  class="border border-black px-2 font-medium" name="image">
                    </label>
                </div>

                <div class="flex justify-between my-4">
                    <label class="font-bold">Location:
                        <input type="text" placeholder="Enter Your Location"  class="border border-black px-2 font-medium" name="location">
                    </label>
                </div>

                <div class="flex justify-between my-4">
                    <label class="font-bold">Google Map Address:
                        <input type="text" placeholder="Enter Your Google Map Location"  class="border border-black px-2 font-medium" name="map">
                    </label>
                </div>

                <div class="font-bold my-4">
                    Type:
                    <label class="font-medium">
                        <input type="radio" name="type" class="ml-2 mr-0.5" value="rent" checked>Rent
                        <input type="radio" name="type" class="ml-2 mr-0.5" value="sell">Sell
                    </label>
                </div>

                <div class="font-bold my-4">
                    Rooms:
                    <label class="font-medium">
                        <input type="radio" name="rooms" class="ml-2 mr-0.5" value="1BHK" checked>1BHK
                        <input type="radio" name="rooms" class="ml-2 mr-0.5" value="2BHK">2BHK
                        <input type="radio" name="rooms" class="ml-2 mr-0.5" value="3BHK">3BHK
                    </label>
                </div>

                <label class="font-bold">
                    Description:
                    <textarea name="description" class="w-full border font-medium border-black px-2 resize-none" rows="10" placeholder="Write About any Extra details.."></textarea>
                </label>

                <div class="mx-auto w-fit">
                    <button class="px-4 py-2 hover:bg-[#2a2a2a] border border-[#2a2a2a] mx-auto hover:text-white" type="button" id="cancel">Cancel</button>
                    <button class="px-4 py-2 bg-[#2a2a2a] hover:bg-black mx-auto text-white" type="submit">ADD</button>
                </div>

            </div>
        </form>
    </div>
</div>
