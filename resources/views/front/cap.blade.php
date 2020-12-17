<?php

/**
 * Simple Captcha
 *
 * @see https://daskhat.ir/?p=777
 * @copyright Daskhat
 * @version 2.0.0
 *
 */

session_start();

if (isset($_POST['submit'])) {
    if ($_SESSION['captcha'] == $_POST['captcha']) {
        $message = "Captcha Is Correct<br>";
    } else {
        $message = "Captcha Isn't Correct<br>";
    }
}
?>


        <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
    <img id="captcha" height="70" width="200" src="jReply/simplephpcaptcha.php"/>
    <span id="refresh-captcha"> ðŸ”„ Refresh </span>
    <form action="" method="post">
        <p class="form-element">
            <input type="text" name="captcha" />
        </p>
        <p class="form-element">
            <input type="submit" name="submit" value="Validate" />
        </p>
    </form>
</div>
<?php if (isset($message)) { ?>
<div class="container">
    <?php echo $message; ?>
</div>
<?php
} ?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#refresh-captcha').click(function () {
            $("#captcha").attr("src", "jReply/simplephpcaptcha.php?timestamp=" + new Date().getTime());
        });
    });

</script>
</body>

</html>