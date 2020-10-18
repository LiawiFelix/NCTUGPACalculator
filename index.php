<?php
require 'function.php';
if (isset($_POST["calculate"])) {
    $input = $_POST["input"];
    $result = calculate($input);
    $done = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCTU GPA Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>NCTU GPA Calculator</h1>
    <div class="boxed-main">
        <p style="text-align: center;">----------- INTRODUCTION ------------</p>
        1. This website doesn't store any data that you input<br>
        2. This website was created because I was too lazy to count the GPA by myself<br>
        3. It is created by me, Liawi<br>
        4. If there is bug, please report it to felixliawii@gmail.com, Thanks<br>
    </div>
    <div class="boxed-main1">
        <p style="text-align: center;">----------- HOW TO USE ------------</p>
        1. Click Transcripts inquiry button at Achievement management >> Browsing student achievement section<br>
        2. Ctrl+a<br>
        3. Copy and Paste it to the box below<br>
    </div>
    <div class="boxed-main1">
        <p style="text-align: center;">----------- 這麼樣用 ------------</p>
        1. 開 "歷年成績查詢" 在 成績管理>>學生成績瀏覽<br>
        2. Ctrl+a<br>
        3. Copy and Paste it to the box below<br>
    </div>
    <form action="" method="POST">
        <div class="container">
            <textarea type="text" name="input" id="input" rows="50" cols="100" required autocomplete="off" placeholder="Paste in this box"><?php if (isset($_POST['input'])) {
                                                                                                                                                echo htmlentities($_POST['input']);
                                                                                                                                            } ?></textarea>
            <?php if (isset($done)) : ?>
                <div class="tablecontainer">
                    <table align="center" border="1" cellpadding="10" cellspacing="0">
                        <p class="res">Result</p>
                        <tr>
                            <th style="font-size: 20px;">Your average percentile score</th>
                            <th style="font-size: 20px;"><?= $result[1]; ?> / 100</th>
                        </tr>
                        <tr>
                            <th style="font-size: 20px;">Your average GPA score</th>
                            <th style="font-size: 20px;"><?= $result[2]; ?> / 4.3</th>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        <div class=" submit">
            <button type="submit" class="calculate" name="calculate" width="50">Calculate!</button>
        </div>
    </form>
</body>

</html>