<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";

$showing = "";

if(isset($setupVars["API_QUERY_LOG_SHOW"]))
{
	if($setupVars["API_QUERY_LOG_SHOW"] === "all")
	{
		$showing = "showing";
	}
	elseif($setupVars["API_QUERY_LOG_SHOW"] === "permittedonly")
	{
		$showing = "showing permitted";
	}
	elseif($setupVars["API_QUERY_LOG_SHOW"] === "blockedonly")
	{
		$showing = "showing blocked";
	}
	elseif($setupVars["API_QUERY_LOG_SHOW"] === "nothing")
	{
		$showing = "showing no queries (due to setting)";
	}
}
else
{
	// If filter variable is not set, we
	// automatically show all queries
	$showing = "showing";
}

$showall = false;
if(isset($_GET["all"]))
{
	$showing .= " إظهار جميع السجلات الموجودة في النظام";
}
else if(isset($_GET["client"]))
{
	$showing .= " سجلات لجهاز ".htmlentities($_GET["client"]);
}
else if(isset($_GET["domain"]))
{
	$showing .= " سجلات للنظاقات ".htmlentities($_GET["domain"]);
}
else if(isset($_GET["from"]) || isset($_GET["until"]))
{
	$showing .= " سجلات في وقت معين";
}
else
{
	$showing .= " إظهار الى 100 سجل ";
	$showall = true;
}

if(isset($setupVars["API_PRIVACY_MODE"]))
{
	if($setupVars["API_PRIVACY_MODE"])
	{
		// Overwrite string from above
		$showing .= ", privacy mode enabled";
	}
}

if(strlen($showing) > 0)
{
	$showing = "(".$showing.")";
	if($showall)
		$showing .= ", <a href=\"?all\">show all</a>";
}
?>

<!-- Alert Modal -->
<div id="alertModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <span class="fa-stack fa-2x" style="margin-bottom: 10px">
                        <div class="alProcessing">
                            <i class="fa-stack-2x alSpinner"></i>
                        </div>
                        <div class="alSuccess" style="display: none">
                            <i class="fa fa-circle fa-stack-2x text-green"></i>
                            <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                        </div>
                        <div class="alFailure" style="display: none">
                            <i class="fa fa-circle fa-stack-2x text-red"></i>
                            <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                        </div>
                    </span>
                    <div class="alProcessing"> إضافة <span id="alDomain"></span> إلى <span id="alList"></span>...</div>
                    <div class="alSuccess text-bold text-green" style="display: none"><span id="alDomain"></span> تم الإضافة بنجاح الى <span id="alList"></span></div>
                    <div class="alFailure text-bold text-red" style="display: none">
                        <span id="alNetErr"> انتهى وقت الجلسة .. او ان الاتصل قد فقد </span>
                        <span id="alCustomErr"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="box" id="recent-queries">
        <div class="box-header with-border">
          <h3 class="box-title"> سجلات البحث الأخيرة <?php echo $showing; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="all-queries" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>الوقت</th>
                        <th>النوع</th>
                        <th>النطاق</th>
                        <th>الجهاز</th>
                        <th>الحالة</th>
                        <th>الرد</th>
                        <th>التنفيذ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>الوقت</th>
                        <th>النوع</th>
                        <th>النطاق</th>
                        <th>الجهاز</th>
                        <th>الحالة</th>
                        <th>الرد</th>
                        <th>التنفيذ</th>
                    </tr>
                </tfoot>
            </table>
            <p><strong>خيارات البحث :</strong></p>
            <ul>
                <li>استخدم  <kbd>Ctrl</kbd> أو <kbd>&#8984;</kbd> + <i class="fas fa-mouse-pointer"></i> لأضافة عمود للبحث الحالي</li>
                <li>استخدم  <kbd>Shift</kbd> + <i class="fas fa-mouse-pointer"></i> لحذف عمود للبحث الحالي </li>
            </ul><br/><button type="button" id="resetButton" class="btn btn-default btn-sm text-red hidden">إزالة الفلاتر </button>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
<!-- /.row -->

<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/queries.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
