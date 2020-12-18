<?php
require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';
?>
<br>
<div class="container">
    <h1 id="h1Left">Thank you for your purchase</h1>
    <br>
    <br>
    <br>
    <p>Your download will start in a moment. If it doesn't, use this <a href="index.php?action=download">direct link.</a></p>
</div>
<?php require_once __DIR__ . '/_footer.php'; ?>
<script type="text/javascript">
    window.onload = startDownload();

    function startDownload() {
        window.location = "index.php?action=download";
    }
</script>
