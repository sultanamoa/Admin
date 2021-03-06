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
    <h1> حدد نطاق التاريخ المطلوب للإستعلام عنه في قاعدة البيانات </h1>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">
          قم باختيار التاريخ والوقت
        </h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="form-group col-md-12">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="far fa-clock"></i>
              </div>
              <input type="button" class="form-control pull-right" id="querytime" value=" انقر هنا لتحديد التاريخ والوقت ">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label> حالة البحث:</label>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <div><input type="checkbox" id="type_forwarded" checked><label for="type_forwarded"> مسموح به: موجة </label><br></div>
            <div><input type="checkbox" id="type_cached" checked><label for="type_cached"> مسموح به : مخزن </label></div>
        </div>
        <div class="col-md-3">
            <div><input type="checkbox" id="type_gravity" checked><label for="type_gravity"> محجوب : قاعدة البيانات </label><br></div>
            <div><input type="checkbox" id="type_external" checked><label for="type_external"> محجوب:  خارجي </label></div>
        </div>
        <div class="col-md-3">
            <div><input type="checkbox" id="type_blacklist" checked><label for="type_blacklist"> محجوب: موجود في القائمة السوداء </label><br></div>
            <div><input type="checkbox" id="type_regex" checked><label for="type_regex"> محجوب: مشابة لنطاقات </label></div>
        </div>
        <div class="col-md-3">
            <div><input type="checkbox" id="type_gravity_CNAME" checked><label for="type_gravity_CNAME"> محجوب: من ضمن النظام </label><br></div>
            <div><input type="checkbox" id="type_blacklist_CNAME" checked><label for="type_blacklist_CNAME"> محجوب: موجود في قواعد البيانات </label><br></div>
            <div><input type="checkbox" id="type_regex_CNAME" checked><label for="type_regex_CNAME"> محجوب: مشابة لنطاقات مخزنة في النظام </label></div>
        </div>
    </div>
</div>

<div id="timeoutWarning" class="alert alert-warning alert-dismissible fade in" role="alert" hidden>
    عتمادًا على حجم النطاق الذي حددته ، قد تنتهي مهلة الطلب بينما يحاول النظام استرداد البيانات.<br/><span id="err"></span>
</div>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua no-user-select">
            <div class="inner">
                <h3 class="statistic" id="ads_blocked_exact">---</h3>
                <p>المواقع المحجوبة </p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-paper"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua no-user-select">
            <div class="inner">
                <h3 class="statistic" id="ads_wildcard_blocked">---</h3>
                <p>المواقع المحجوبة (البديلة) </p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-paper"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green no-user-select">
            <div class="inner">
                <h3 class="statistic" id="dns_queries">---</h3>
                <p>مجموع المواقع المحجوبة </p>
            </div>
            <div class="icon">
                <i class="fas fa-globe-americas"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow no-user-select">
            <div class="inner">
                <h3 class="statistic" id="ads_percentage_today">---</h3>
                <p> نسبة المواقع المحجوبة </p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-md-12">
      <div class="box" id="recent-queries">
        <div class="box-header with-border">
          <h3 class="box-title"> سجلات البحث الماضية </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="all-queries" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th> الوقت</th>
                        <th> النوع</th>
                        <th> النطاق</th>
                        <th> العنوان</th>
                        <th> الحالة</th>
                        <th> الأمر</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>الوقت</th>
                        <th>النوع</th>
                        <th>النطاق</th>
                        <th>العنوان</th>
                        <th>الحالة</th>
                        <th>الأمر</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
<!-- /.row -->

<script src="scripts/vendor/daterangepicker.min.js"></script>
<script src="scripts/pi-hole/js/db_queries.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
