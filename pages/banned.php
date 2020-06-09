<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeaOS · FREE ONLINE OPERATING SYSTEM FOR ALL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="assets/css/banned.css">
</head>
<body>
    <audio src="include/sounds/banned.mp3" autoplay loop></audio>
    <div class="center">
        <h1>You are banned until <?php echo date('d-m-Y H:i', $banned_info['date_finish']); ?></h1>
        <h2>Reason: <?php echo $banned_info['reason']; ?></h2>
    </div>
</body>
</html>