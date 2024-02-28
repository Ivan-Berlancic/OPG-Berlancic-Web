function updateNavbarLinks() {
    $.ajax({
        url: 'check_login_status.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.loggedIn) {
                if (response.isAdmin) {
                    $('#navbar-list').append('<li class="nav-item"><a href="admin_page.html" class="nav-link">Admin</a></li>');
                }
                $('#navbar-list').append('<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>');
            } else {
                $('#navbar-list').append('<li class="nav-item"><a href="login_form.html" class="nav-link">Login</a></li>');
            }
            setActiveNavItem();
        }
    });
}

function setActiveNavItem() {
    var url = window.location.pathname;
    $('#navbar-list a.nav-link').removeClass('active');
    $('#navbar-list a.nav-link').each(function() {
        if ($(this).attr('href') === url) {
            $(this).addClass('active');
        }
    });
}

function createNavbar() {
    var navbarHtml = `
        <nav class="navbar navbar-expand-md bg-dark navbar-dark py-3 fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">OPG Berlančić</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul id="navbar-list" class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="naslovnica.html" class="nav-link">Naslovnica</a>
                        </li>
                        <li class="nav-item">
                            <a href="o_nama.html" class="nav-link">Info</a>
                        </li>
                        <li class="nav-item">
                            <a href="products.html" class="nav-link">Proizvodi</a>
                        </li>
                        <li class="nav-item">
                            <a href="fotogalerija.html" class="nav-link">Fotogalerija</a>
                        </li>
                        <li class="nav-item">
                            <a href="naslovnica.html#kontakt" class="nav-link">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a href="reviews.html" class="nav-link">Recenzije</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    `;

    $("body").prepend(navbarHtml);

    updateNavbarLinks();
}


$(document).ready(function () {

    createNavbar();
});
