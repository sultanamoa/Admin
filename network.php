<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>

<!-- Sourceing CSS colors from stylesheet to be used in JS code -->
<span class="queries-permitted"></span>
<span class="queries-blocked"></span>
<span class="graphs-grid"></span>
<span class="graphs-ticks"></span>

<div class="row">
    <div class="col-md-12">
      <div class="box" id="network-details">
        <div class="box-header with-border">
          <h3 class="box-title">نظرة عامة على الشبكة</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="network-entries" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>قائمة العناوين</th>
                        <th>قائمة عناوين الأجهزة</th>
                        <th>المجال</th>
                        <th>اسم الجهاز</th>
                        <th>أول ظهور</th>
                        <th>آخر بحث</th>
                        <th>عدد مرات البحث</th>
                        <th>يستعمل نظام حماية الشبكة</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>قائمة العناوين</th>
                        <th>قائمة عناوين الأجهزة</th>
                        <th>المجال</th>
                        <th>اسم الجهاز</th>
                        <th>ول ظهور</th>
                        <th>آخر بحث</th>
                        <th>عدد مرات البحث</th>
                        <th>يستعمل نظام حماية الشبكة</th>
                    </tr>
                </tfoot>
            </table>
            <label>لون الخلفية : اخر بحث من هذا الجهاز على الشبكة </label>
        <table width="100%">
          <tr class="text-center">
            <td class="network-recent" width="15%">الآن</td>
            <td class="network-gradient" width="30%">... من ...</td>
            <td class="network-old" width="15%">24 ساعة ماضية</td>
            <td class="network-older" width="20%">&gt; 24 ساعة ماضية</td>
            <td class="network-never" width="20%">الجهاز لا يستعمل نظام حماية للشبكة</td>
          </tr>
        </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
<!-- /.row -->

<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/ip-address-sorting.js"></script>
<script src="scripts/pi-hole/js/network.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
