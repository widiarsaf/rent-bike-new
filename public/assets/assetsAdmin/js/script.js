/*var width = $(window).width(), height = $(window).height();
alert('width : ' +width + 'height : ' + height);*/
"use strict";
$(document).ready(function ()
{
    var $window = $(window);
    //add id to main menu for mobile menu start
    var getBody = $("body");
    var bodyClass = getBody[0].className;
    $(".main-menu").attr('id', bodyClass);
    //add id to main menu for mobile menu end

    // card js start
    $(".card-header-right .close-card").on('click', function ()
    {
        var $this = $(this);
        $this.parents('.card').animate({
            'opacity': '0',
            '-webkit-transform': 'scale3d(.3, .3, .3)',
            'transform': 'scale3d(.3, .3, .3)'
        });

        setTimeout(function ()
        {
            $this.parents('.card').remove();
        }, 800);
    });
    $(".card-header-right .reload-card").on('click', function ()
    {
        var $this = $(this);

        $this.parents('.card').addClass("card-load");
        $this.parents('.card').append('<div class="card-loader"><i class="icofont icofont-refresh rotate-refresh"></div>');
        setTimeout(function ()
        {
            $this.parents('.card').children(".card-loader").remove();
            $this.parents('.card').removeClass("card-load");
        }, 3000);
    });
    $(".card-header-right .card-option .icofont-simple-left").on('click', function ()
    {
        var $this = $(this);
        if ($this.hasClass('icofont-simple-right'))
        {
            $this.parents('.card-option').animate({
                'width': '35px',
            });
        } else
        {
            $this.parents('.card-option').animate({
                'width': '180px',
            });
        }
        $(this).toggleClass("icofont-simple-right").fadeIn('slow');
        // $this.children("li .icofont-simple-left").toggleClass("");
    });

    $(".card-header-right .minimize-card").on('click', function ()
    {
        var $this = $(this);
        var port = $($this.parents('.card'));
        var card = $(port).children('.card-block').slideToggle();
        $(this).toggleClass("icofont-plus").fadeIn('slow');
    });
    $(".card-header-right .full-card").on('click', function ()
    {
        var $this = $(this);
        var port = $($this.parents('.card'));
        port.toggleClass("full-card");
        $(this).toggleClass("icofont-resize");
    });

    $(".card-header-right .icofont-spinner-alt-5").on('mouseenter mouseleave', function ()
    {
        $(this).toggleClass("rotate-refresh").fadeIn('slow');
    });
    $("#more-details").on('click', function ()
    {
        $(".more-details").slideToggle(500);
    });
    $(".mobile-options").on('click', function ()
    {
        $(".navbar-container .nav-right").slideToggle('slow');
    });
    $(".main-search").on('click', function ()
    {
        $("#morphsearch").addClass('open');
    });
    $(".morphsearch-close").on('click', function ()
    {
        $("#morphsearch").removeClass('open');
    });
    // card js end
    $.mCustomScrollbar.defaults.axis = "yx";
    $("#styleSelector .style-cont").mCustomScrollbar({
        setTop: "10px",
        setHeight: "calc(100% - 200px)",
    });
    $(".main-menu").mCustomScrollbar({
        setTop: "10px",
        setHeight: "calc(100% - 80px)",
    });
});
$(document).ready(function ()
{
    $(function ()
    {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('.theme-loader').fadeOut('slow', function ()
    {
        $(this).remove();
    });
});

// toggle full screen
function toggleFullScreen()
{
    var a = $(window).height() - 10;

    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement)
    { // current working methods
        if (document.documentElement.requestFullscreen)
        {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen)
        {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen)
        {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else
    {
        if (document.cancelFullScreen)
        {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen)
        {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen)
        {
            document.webkitCancelFullScreen();
        }
    }
}

//light box
$(document).on('click', '[data-toggle="lightbox"]', function (event)
{
    event.preventDefault();
    $(this).ekkoLightbox();
});


// Upgrade Button
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function ()
{
    if ($window.scrollTop() >= 200)
    {
        nav.addClass('active');
    }
    else
    {
        nav.removeClass('active');
    }
});


$('#edit').on('show.bs.modal', function (event)
{
    var button = $(event.relatedTarget)
    var namakategori = button.data('namakategori')
    var idkategori = button.data('idkategori')
    var modal = $(this)
    modal.find('.modal-body #namaKategori').val(namakategori);
    modal.find('.modal-body #idKategori').val(idkategori);
})



$('#delete').on('show.bs.modal', function (event)
{
    var button = $(event.relatedTarget)
    var idkategori = button.data('idkategori')
    var modal = $(this)
    modal.find('.modal-body #idKategori').val(idkategori);
})



$('#editPaket').on('show.bs.modal', function (event)
{
    var button = $(event.relatedTarget)
    var namapaket = button.data('namapaket')
    var jam = button.data('jam')
    var harga = button.data('harga')
    var idpaket = button.data('idpaket')
    var modal = $(this)
    console.log(idpaket)
    modal.find('.modal-body #namaPaket').val(namapaket);
    modal.find('.modal-body #jam').val(jam);
    modal.find('.modal-body #harga').val(harga);
    modal.find('.modal-body #idPaket').val(idpaket);
})

$('#deletePaket').on('show.bs.modal', function (event)
{
    var button = $(event.relatedTarget)
    var idpaket = button.data('idpaket')
    var modal = $(this)
    modal.find('.modal-body #idPaket').val(idpaket);
})


// Katalog
$('#editKatalog').on('show.bs.modal', function (event)
{
    var button = $(event.relatedTarget)
    var namakatalog = button.data('namakatalog')
    var deskripsikatalog = button.data('deskripsikatalog')
    var idkatalog = button.data('idkatalog')
    var modal = $(this)
    modal.find('.modal-body #namaKatalog').val(namakatalog);
    modal.find('.modal-body #deskripsiKatalog').val(deskripsikatalog);
    modal.find('.modal-body #idKatalog').val(idkatalog);
})



$('#deleteKatalog').on('show.bs.modal', function (event)
{
    var button = $(event.relatedTarget)
    var idkatalog = button.data('idkatalog')
    var modal = $(this)
    modal.find('.modal-body #idKatalog').val(idkatalog);
})





$(document).ready(function ()
{
    $('#tabelSepeda').DataTable();
});


$(document).ready(function ()
{
    $('#tabelPaket').DataTable();
});

$(document).ready(function ()
{
    $('#tabelPenyewaan').DataTable();
});



// Calendar


$(document).ready(function ()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        selectable: true,
        selectHelper: true,
        select: function (start)
        {
            var tanggal = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
            var formDate = $('#formDate');
            var selectDate = $('#selectDate');
            selectDate.val(tanggal);
            formDate.submit();
            calendar.fullCalendar('unselect');

        },

        unselect: function (start)
        {
            var dummy = " ";
            var formDate = $('#formDate');
            var selectDate = $('#selectDate');
            selectDate.val();
            formDate.submit();

        },




    });


});









