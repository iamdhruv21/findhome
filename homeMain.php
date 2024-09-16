<div id="main" class="w-full h-[90vh] lg:px-6 px-4 py-4 bg-gray-50">
    <h2 class="text-2xl text-center lg:text-4xl lg:font-bold">Find the Best Places for Your Dream House</h2>

    <div class="flex gap-3 my-3">
        <label class="px-2 pr-0 py-1 font-bold text-[#2a2a2a]">Search By: </label>
        <label>
            <select class="px-2 pr-0 py-1 rounded-3xl bg-[#222] text-white">
                <option>Rent</option>
                <option>Sell</option>
            </select>
        </label>
        <label>
            <select class="px-2 pr-0 py-1 rounded-3xl bg-[#222] text-white">
                <option>1BHK</option>
                <option>2BHK</option>
                <option>3BHK</option>
            </select>
        </label>
    </div>


    <div id="grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mx-4 md:mx-8 lg:px-4 py-4">
        <?php
//            $servername = "127.0.0.1:3306";
//            $username = 'root';
//            $password = '@21Nov2004';
//            $database = 'ClientDetailsDB';
//
//            $conn = mysqli_connect($servername, $username, $password, $database);
//
//            if (!$conn){
//                echo "error";
//            }

        $existSql = "SELECT * FROM Details;";
        $result1 = mysqli_query($conn, $existSql);
        ?>
        <?php foreach ($result1 as $item) :?>
            <div class="card">
                <div class="img w-full">
                    <img src="<?=$item['image']?>" alt="image" class="w-full">
                </div>
                <div class="detail lg:h-[15%] md:px-2 px-1">
                    <h4 class="font-bold md:text-xl"><?=$item['location']?></h4>
                    <p class="mb-2 text-sm md:text-lg"><?=$item['description']?></p>
                    <div class="my-2 md:my-4">
                        <span><?=strtoupper($item['type'])?></span>
                        <span><?=strtoupper($item['rooms'])?></span>
                    </div>
                    <form action="/single" method="get">
                        <input type="hidden" name="id" value="<?=$item['id']?>">
                        <button class="btn" type="submit">Details →</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
