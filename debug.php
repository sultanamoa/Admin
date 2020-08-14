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
    <h1>إنشاء سجل التصحيح الأخطاء في النظام </h1>
</div>
<div>
    <input type="checkbox" id="upload">
    <label for="upload">تحميل مجلد تصحيح الأخطاء بمجرد الأنتهاء</label>
</div>
<p>بمجرد النقر فوق هذا الزر ، سيتم إنشاء سجل تصحيح الأخطاء ويمكن تحميله تلقائيًا</p>
<button type="button" id="debugBtn" class="btn btn-lg btn-primary btn-block">إنشاء سجل التصحيح</button>
<pre id="output" style="width: 100%; height: 100%;" hidden></pre>

<script src="scripts/pi-hole/js/debug.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
