/* Pi-hole: A black hole for Internet advertisements
 *  (c) 2017 Pi-hole, LLC (https://pi-hole.net)
 *  Network-wide ad blocking via your own hardware.
 *
 *  This file is copyright under the latest version of the EUPL.
 *  Please see LICENSE file for your rights under this license. */

var exact = "";

function quietfilter(ta, data) {
  var lines = data.split("\n");
  for (var i = 0; i < lines.length; i++) {
    if (lines[i].indexOf("results") !== -1 && lines[i].indexOf("0 results") === -1) {
      var shortstring = lines[i].replace("::: /etc/pihole/", "");
      // Remove "(x results)"
      shortstring = shortstring.replace(/\(.*/, "");
      ta.append(shortstring + "\n");
    }
  }
}

function eventsource() {
  var ta = $("#output");
  var domain = $("#domain").val().trim();
  var q = $("#quiet");

  if (domain.length === 0) {
    return;
  }

  var quiet = false;
  if (q.val() === "yes") {
    quiet = true;
    exact = "exact";
  }

  // IE does not support EventSource - load whole content at once
  if (typeof EventSource !== "function") {
    $.ajax({
      method: "GET",
      url: "scripts/pi-hole/php/queryads.php?domain=" + domain.toLowerCase() + exact + "&IE",
      async: false
    }).done(function (data) {
      ta.show();
      ta.empty();
      if (!quiet) {
        ta.append(data);
      } else {
        quietfilter(ta, data);
      }
    });
    return;
  }

  // eslint-disable-next-line compat/compat
  var source = new EventSource(
    "scripts/pi-hole/php/queryads.php?domain=" + domain.toLowerCase() + "&" + exact
  );

  // Reset and show field
  ta.empty();
  ta.show();

  source.addEventListener(
    "message",
    function (e) {
      if (!quiet) {
        ta.append(e.data);
      } else {
        quietfilter(ta, e.data);
      }
    },
    false
  );

  // Will be called when script has finished
  source.addEventListener(
    "error",
    function () {
      source.close();
    },
    false
  );

  // Reset exact variable
  exact = "";
}

// Handle enter button
$(document).keypress(function (e) {
  if (e.which === 13 && $("#domain").is(":focus")) {
    // Enter was pressed, and the input has focus
    exact = "";
    eventsource();
  }
});
// Handle button
$("#btnSearch").on("click", function () {
  exact = "";
  eventsource();
});
// Handle exact button
$("#btnSearchExact").on("click", function () {
  exact = "exact";
  eventsource();
});

// Wrap form-group's buttons to next line when viewed on a small screen
$(window).on("resize", function () {
  if ($(window).width() < 992) {
    $(".form-group.input-group").removeClass("input-group").addClass("input-group-block");
    $(".form-group.input-group-block > input").css("margin-bottom", "5px");
    $(".form-group.input-group-block > .input-group-btn")
      .removeClass("input-group-btn")
      .addClass("btn-block text-center");
  } else {
    $(".form-group.input-group-block").removeClass("input-group-block").addClass("input-group");
    $(".form-group.input-group > input").css("margin-bottom", "");
    $(".form-group.input-group > .btn-block.text-center")
      .removeClass("btn-block text-center")
      .addClass("input-group-btn");
  }
});
$(function () {
  $(window).trigger("resize");
});
