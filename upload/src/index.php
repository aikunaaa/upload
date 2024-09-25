<?php
define("UPLOAD_PATH", "upload");

$is_upload = false;
$msg = null;
$uploaded_path = null; // 添加一个变量来存储上传成功的路径

if (isset($_POST['submit'])) {
if (file_exists(UPLOAD_PATH)) {
$temp_file = $_FILES['upload_file']['tmp_name'];
$img_path = UPLOAD_PATH . '/' . $_FILES['upload_file']['name'];
if (move_uploaded_file($temp_file, $img_path)) {
$is_upload = true;
$uploaded_path = $img_path; // 上传成功后保存路径
} else {
$msg = '上传出错！';
}
} else {
$msg = UPLOAD_PATH . '文件夹不存在,请手工创建！';
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snowfall demo - Starback.js</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Catamaran:wght@400;500;900&family=Noto+Sans+JP&family=Poppins:wght@400;500;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="app">

        <section id="hero">
            <div class="hero-left">
                <div class="text">
                    <h1 class="kanji"></h1>
                    <h1 class="big-text mb-5">请上传文件</h1>
                    <form enctype="multipart/form-data" method="post" onsubmit="return checkFile()">
                        <p>请选择要上传的图片：</p>
                        <input class="input_file" type="file" name="upload_file" />
                        <input class="button" type="submit" name="submit" value="上传" />
                    </form>
                    <div id="msg">
                        <?php 
                    if ($msg != null) {
                        echo "提示：" . $msg;
                    }
                ?>
                    </div>
                    <div id="upload_result">
                        <?php
                    if ($is_upload) {
                        echo '上传成功！文件路径：' . $uploaded_path;
                    }
                ?>
                    </div>
                    </li>
                    <?php 
            if ($_GET['action'] == "show_code") {
                include 'show_code.php';
            }
        ?>
                    <p class="mb-5">
                        说好的零基础，你们这些人怎么回事？！<br>
                        说好的零基础，你们这些人怎么回事？！<br>
                        说好的零基础，你们这些人怎么回事？！<br>
                        <img src="2.jpg" alt="" style="width: 500px; height: auto;" />
                    </p>
                </div>
                <div class="hiragana">啄木鸟</div>
            </div>
            <div class="hero-right">
                <div class="canvas-wrapper">
                    <canvas id="canvas"></canvas>
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/starback@2.0.1/dist/starback.js"></script>

    <script>
    let wrapper = document.querySelector('.canvas-wrapper');

    const starback = new Starback("#canvas", {
        width: wrapper.clientWidth,
        height: wrapper.clientHeight,
        type: 'dot',
        quantity: 75,
        starSize: [1, 7],
        direction: 20,
        starColor: '#FFE2F4',
        randomOpacity: [0.7, 1],
        backgroundColor: 'transparent'
    })
    </script>

    <script type="text/javascript">
    function checkFile() {
        var file = document.getElementsByName('upload_file')[0].value;
        if (file == null || file == "") {
            alert("请选择要上传的文件!");
            return false;
        }
        var allow_ext = ".jpg|.png|.gif";
        var ext_name = file.substring(file.lastIndexOf("."));
        if (allow_ext.indexOf(ext_name) == -1) {
            var errMsg = "该文件不允许上传，请上传" + allow_ext + "类型的文件，当前文件类型为：" + ext_name;
            alert(errMsg);
            return false;
        }
    }
    </script>
</body>

</html>