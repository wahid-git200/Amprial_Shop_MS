$.sidebarMenu = function (menu) {
    var animationSpeed = 300;

    $(menu).on("click", "li a", function (e) {
        var $this = $(this);
        var checkElement = $this.next();

        if (checkElement.is(".treeview-menu") && checkElement.is(":visible")) {
            checkElement.slideUp(animationSpeed, function () {
                checkElement.removeClass("menu-open");
            });
            checkElement.parent("li").removeClass("active");
        }

        //If the menu is not visible
        else if (
            checkElement.is(".treeview-menu") &&
            !checkElement.is(":visible")
        ) {
            //Get the parent menu
            var parent = $this.parents("ul").first();
            //Close all open menus within the parent
            var ul = parent.find("ul:visible").slideUp(animationSpeed);
            //Remove the menu-open class from the parent
            ul.removeClass("menu-open");
            //Get the parent li
            var parent_li = $this.parent("li");

            //Open the target menu and add the menu-open class
            checkElement.slideDown(animationSpeed, function () {
                //Add the class active to the parent li
                checkElement.addClass("menu-open");
                parent.find("li.active").removeClass("active");
                parent_li.addClass("active");
            });
        }
        //if this isn't a link, prevent the page from being redirected
        if (checkElement.is(".treeview-menu")) {
            e.preventDefault();
        }
    });
};
$.sidebarMenu($(".sidebar-menu"));
$(function () {
    var currentUrl = window.location.href.split(/[?#]/)[0]; // Current page URL without query/hash
    var matched = false;

    // Remove existing classes
    $(".sidebar-menu li, .sidebar-menu a").removeClass("active current-page");
    $(".sidebar-menu .treeview-menu").removeClass("menu-open").hide();

    // Loop once to find and activate exact match
    $(".sidebar-menu a").each(function () {
        if (matched) return; // Stop once a match is found

        var linkUrl = this.href.split(/[?#]/)[0];

        // Match only exact href
        if (linkUrl === currentUrl) {
            const $link = $(this);
            $link.addClass("current-page");
            $link.closest("li").addClass("active current-page");

            // If inside a submenu, expand the tree
            $link.parents(".treeview-menu").addClass("menu-open").show();
            $link.parents(".treeview").addClass("active");

            matched = true;
        }
    });
});

// Custom Sidebar JS
jQuery(function ($) {
    //toggle sidebar
    $("#toggle-sidebar").on("click", function () {
        $(".page-wrapper").toggleClass("toggled");
    });

    // Pin sidebar on click
    $("#pin-sidebar").on("click", function () {
        if ($(".page-wrapper").hasClass("pinned")) {
            // unpin sidebar when hovered
            $(".page-wrapper").removeClass("pinned");
            $("#sidebar").unbind("hover");
        } else {
            $(".page-wrapper").addClass("pinned");
            $("#sidebar").hover(
                function () {
                    console.log("mouseenter");
                    $(".page-wrapper").addClass("sidebar-hovered");
                },
                function () {
                    console.log("mouseout");
                    $(".page-wrapper").removeClass("sidebar-hovered");
                }
            );
        }
    });

    // Pinned sidebar
    $(function () {
        $(".page-wrapper").hasClass("pinned");
        $("#sidebar").hover(
            function () {
                console.log("mouseenter");
                $(".page-wrapper").addClass("sidebar-hovered");
            },
            function () {
                console.log("mouseout");
                $(".page-wrapper").removeClass("sidebar-hovered");
            }
        );
    });

    // Toggle sidebar overlay
    $("#overlay").on("click", function () {
        $(".page-wrapper").toggleClass("toggled");
    });

    // Added by Srinu
    $(function () {
        // When the window is resized,
        $(window).resize(function () {
            // When the width and height meet your specific requirements or lower
            if ($(window).width() <= 768) {
                $(".page-wrapper").removeClass("pinned");
            }
        });
        // When the window is resized,
        $(window).resize(function () {
            // When the width and height meet your specific requirements or lower
            if ($(window).width() >= 768) {
                $(".page-wrapper").removeClass("toggled");
            }
        });
    });
});

/***********
***********
***********
	Bootstrap JS 
***********
***********
***********/

// Tooltip
var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Popover
var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
});

document.addEventListener("DOMContentLoaded", function () {
    const currentYear = new Date().getFullYear(); // Get current year (e.g., 2025)
    const select = document.getElementById("abc5");

    // Loop through options and select the one that matches current year
    for (let option of select.options) {
        if (option.text === String(currentYear)) {
            option.selected = true;
            break;
        }
    }
});

function gregorianToJalali(gy, gm, gd) {
    const g_d_m = [
        0,
        31,
        (gy % 4 === 0 && gy % 100 !== 0) || gy % 400 === 0 ? 29 : 28,
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];
    let jy = gy <= 1600 ? 0 : 979;
    gy -= gy <= 1600 ? 621 : 1600;
    let gy2 = gm > 2 ? gy + 1 : gy;
    let days =
        365 * gy +
        Math.floor((gy2 + 3) / 4) -
        Math.floor((gy2 + 99) / 100) +
        Math.floor((gy2 + 399) / 400);
    for (let i = 0; i < gm; ++i) {
        days += g_d_m[i];
    }
    days += gd - 1;
    let j_days = days - 79;
    let j_np = Math.floor(j_days / 12053);
    j_days %= 12053;
    jy += 33 * j_np + 4 * Math.floor(j_days / 1461);
    j_days %= 1461;
    if (j_days >= 366) {
        jy += Math.floor((j_days - 1) / 365);
        j_days = (j_days - 1) % 365;
    }
    const jm =
        j_days < 186
            ? 1 + Math.floor(j_days / 31)
            : 7 + Math.floor((j_days - 186) / 30);
    const jd = 1 + (j_days < 186 ? j_days % 31 : (j_days - 186) % 30);
    return [jy, jm, jd];
}

document.addEventListener("DOMContentLoaded", function () {
    const now = new Date();
    const [jy, jm, jd] = gregorianToJalali(
        now.getFullYear(),
        now.getMonth() + 1,
        now.getDate()
    );

    // انتخاب ماه جاری در فرم
    const select = document.getElementById("monthSelect");
    select.value = jm.toString(); // چون option ها value از 1 تا 12 دارند
});

// زمانی که دیتای تاریخ تعغیر کرد

///////////////////////form add
const itemType = document.getElementById("itemType");
const forms = {
    com: document.getElementById("form-comp"),
    com_asso: document.getElementById("form-comp-asso"),
    mobile: document.getElementById("form-mobile"),
    mobile_asso: document.getElementById("form-mobile-asso"),
    cable: document.getElementById("form-cable"),
    hardwear: document.getElementById("form-hardwear"),
    softwear: document.getElementById("form-softwear"),
    google: document.getElementById("form-film"),
};

function showForm(type) {
    for (let key in forms) {
        forms[key].classList.remove("activer");
    }
    forms[type].classList.add("activer");
}

// Default form
showForm(itemType.value);

itemType.addEventListener("change", function () {
    showForm(this.value);
});
