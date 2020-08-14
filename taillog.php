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
    <h1>الاستعلامات الحية من النظام لجميع إتصالات الشبكة</h1>
</div>

<div>
    <input type="checkbox" checked id="chk1">
    <label for="chk1">التمرير التلقائي عند التحديث</label>
</div>

<pre id="output" style="width: 100%; height: 100%; max-height:650px; overflow-y:scroll;"></pre>

<div>
    <input type="checkbox" checked id="chk2">
    <label for="chk2">التمرير التلقائي عند التحديث</label>
</div>

<script src="scripts/pi-hole/js/taillog.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
