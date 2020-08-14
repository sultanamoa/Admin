<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>
<!-- Title -->
<div class="page-header">
    <h1> تحديث قائمة الموقع المحجوبة في  (نظام المجموعات) </h1>
</div>

<!-- Alerts -->
<div id="alInfo" class="alert alert-info alert-dismissible fade in" role="alert" hidden>
    <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    تحديث .. قد يستغرق بعضا من الوقت. <strong> الرجاء عدم مغادرة الصفحة اثناء التحديث</strong>
</div>
<div id="alSuccess" class="alert alert-success alert-dismissible fade in" role="alert" hidden>
    <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    تهانينا !
</div>

<button type="button" id="gravityBtn" class="btn btn-lg btn-primary btn-block"> تحديث </button>
<pre id="output" style="width: 100%; height: 100%;" hidden></pre>

<script src="scripts/pi-hole/js/gravity.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
