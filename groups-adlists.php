<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2019 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>

<!-- Title -->
<div class="page-header">
    <h1>قائمة التحكم بمجموعات روابط المواقع</h1>
	 <h3 class="box-title">
                    في هذه القائمة تستطيع ان تجمع جميع المواقع في رابط واحد وتضعها هنا وسوف يتمكن النظام بعد تنفيذ الأمر من قراءتها وتنفيذها
                </h3>
</div>

<!-- Domain Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="add-group">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">
                    اضافة مجموعة جديدة
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="new_address"> :العنوان</label>
                        <input id="new_address" type="text" class="form-control" placeholder="URL or space-separated URLs" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="new_comment">:ملاحظة </label>
                        <input id="new_comment" type="text" class="form-control" placeholder="Adlist description (optional)">
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <strong> :الطلبات</strong>
                <ol>
                    <li> الرجاء تشغيل <code> نظام الحجب   مباشرة </code> <a href="gravity.php"> للقيام بتحديث القوائم  </a>  </li>
                    <li> الروابط يمكنك اضافتها دفعة واحدة مع جعل مسافة بينهما  <i>مميز</i> العنوان مع مسافة </li>
                </ol>
                <button type="button" id="btnAdd" class="btn btn-primary pull-right">اضافة</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box" id="adlists-list">
            <div class="box-header with-border">
                <h3 class="box-title">
                    قائمة بالروابط المضافة
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="adlistsTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>العنوان</th>
                        <th>الحالة</th>
                        <th>تعليق</th>
                        <th>تحكم بالمجموعات</th>
                        <th>الأمر</th>
                    </tr>
                    </thead>
                </table>
                <button type="button" id="resetButton" class="btn btn-default btn-sm text-red hidden"> اعادة ضبط الإعدادات </button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<script src="scripts/vendor/bootstrap-select.min.js"></script>
<script src="scripts/vendor/bootstrap-toggle.min.js"></script>
<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/groups-adlists.js"></script>

<?php
require "scripts/pi-hole/php/footer.php";
?>
