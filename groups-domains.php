<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2019 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
    $type = "all";
    $pagetitle = "نطاقات";
    $adjective = "";
    if (isset($_GET['type']) && ($_GET['type'] === "white" || $_GET['type'] === "black")) {
        $type = $_GET['type'];
        $pagetitle = ucfirst($type)."list";
        $adjective = $type."listed";
    }
?>

<!-- Title -->
<div class="page-header">
    <h1><?php echo $pagetitle; ?> المواقع </h1>
</div>

<!-- Domain Input -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="add-group">
            <div class="box-header with-border">
                <h3 class="box-title">
                     جديد <?php echo $adjective; ?> نطاقات اوفلتر 
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active" role="presentation">
                            <a href="#tab_domain" aria-controls="tab_domain" aria-expanded="true" role="tab" data-toggle="tab">النطاق</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab_regex" aria-controls="tab_regex" aria-expanded="false" role="tab" data-toggle="tab">فلتر بالاسم</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Domain tab -->
                        <div id="tab_domain" class="tab-pane active fade in">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_domain"> النطاق:</label>
                                            <input id="new_domain" type="url" class="form-control active" placeholder="Domain to be added" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="new_domain_comment"> وصف للموقع:</label>
                                    <input id="new_domain_comment" type="text" class="form-control" placeholder="Description (optional)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <input type="checkbox" id="wildcard_checkbox">
                                        <label for="wildcard_checkbox"><strong> اضافة النطاقات الفرعية </strong></label>
                                        <p>حدد هذا المربع إذا كنت تريد تضمين جميع المجالات الفرعية. سيتم تحويل المجال الذي تم إدخاله إلى عامل تصفية.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- RegEx tab -->
                        <div id="tab_regex" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new_regex">تعبير عن موقع :</label>
                                        <input id="new_regex" type="text" class="form-control active" placeholder="RegEx to be added">
                                    </div>
                                    <div class="form-group">
                                        <strong> تلميح:</strong> هل تحتاج مساعدة في كتابة التعبيرات . هناك 
                                        <a href="https://docs.pi-hole.net/ftldns/regex/tutorial" rel="noopener" target="_blank">
                                            برنامج تعليمي عن التعبيرات العادية</a>.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="new_regex_comment"> تعليق:</label>
                                        <input id="new_regex_comment" type="text" class="form-control" placeholder="Description (optional)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with buttons">
                    <?php if ( $type !== "white" ) { ?>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-primary" id="add2black">إضافة الى القائمة السوداء</button>
                    </div>
                    <?php } if ( $type !== "black" ) { ?>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn btn-primary" id="add2white">إضافة الى القائمة البيضاء</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- Domain List -->
<div class="row">
    <div class="col-md-12">
        <div class="box" id="domains-list">
            <div class="box-header with-border">
                <h3 class="box-title">
                    قائمة <?php echo $adjective; ?> الإدخال
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="domainsTable" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th> النطاق/التعبير</th>
                        <th> النوع </th>
                        <th> الحالة</th>
                        <th> تعليق </th>
                        <th> مهام المجموعة </th>
                        <th>الأمر</th>
                    </tr>
                    </thead>
                </table>
                <button type="button" id="resetButton" class="btn btn-default btn-sm text-red hidden"> إعادة تنسيق الفلتر</button>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<script src="scripts/vendor/bootstrap-select.min.js"></script>
<script src="scripts/vendor/bootstrap-toggle.min.js"></script>
<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/groups-domains.js"></script>

<?php
require "scripts/pi-hole/php/footer.php";
?>
