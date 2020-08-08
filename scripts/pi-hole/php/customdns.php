<?php

    require_once "func.php";

    $customDNSFile = "/etc/pihole/custom.list";

    require_once('auth.php');

    // Authentication checks
    if (isset($_POST['token'])) {
        check_cors();
        check_csrf($_POST['token']);
    } else {
        log_and_die('غير مسموح (الصفحة اللتي تحاول الاتصال بها غير موجوده,الرجاء اعادة تحديث الصفحة)!');
    }


    switch ($_POST['action'])
    {
        case 'get':     echo json_encode(echoCustomDNSEntries()); break;
        case 'add':     echo json_encode(addCustomDNSEntry());    break;
        case 'delete':  echo json_encode(deleteCustomDNSEntry()); break;
        default:
            die("Wrong action");
    }


?>
