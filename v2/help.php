<?php 
if ( isset($_POST["enTitle"]) ) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://trendylegend.createstore.link/requests/dashboard/index.php?a=Product&action=add',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'categoryId' => "{$_POST["categoryId"]}",
        'sizeType' => "{$_POST["sizeType"]}",
        'enTitle' => "{$_POST["enTitle"]}",
        'arTitle' => "{$_POST["arTitle"]}",
        'enDetails' => "{$_POST["enDetails"]}",
        'arDetails' => "{$_POST["arDetails"]}",
        'price' => "{$_POST["price"]}",
        'logo[]'=> new CURLFILE("{$_FILES["logo"]["tmp_name"][0]}")
    ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Add Post</title>
</head>
<body style="margin:auto;max-width:980px" class="container-fluid">
    <form action="" method="post" class="form-group" enctype="multipart/form-data">
        <div class="row m-0 w-100">
            <div class="col-12 p-2 text-center"><label>Add New Product {{FAST}}</label></div>
            <div class="col-6 p-2"><input type="text" name="categoryId" class="form-control" placeholder="categoryId"></div>
            <div class="col-6 p-2"><input type="text" name="sizeType" class="form-control" placeholder="sizeType"></div>
            <div class="col-6 p-2"><input type="text" name="enTitle" class="form-control" placeholder="enTitle"></div>
            <div class="col-6 p-2"><input type="text" name="arTitle" class="form-control" placeholder="arTitle"></div>
            <div class="col-6 p-2"><input type="text" name="enDetails" class="form-control" placeholder="enDetails"></div>
            <div class="col-6 p-2"><input type="text" name="arDetails" class="form-control" placeholder="arDetails"></div>
            <div class="col-6 p-2"><input type="text" name="price" class="form-control" placeholder="price"></div>
            <div class="col-6 p-2"><input type="file" name="logo[]" class="form-control" multiple></div>
            <div class="col-12 p-2"><input type="submit" class="btn btn-primary"></div>
        </div>
    </form>
</body>
</html>