$(document).ready(function() {
        
                
	/*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("");
    });

    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});

    /*Smooth link animation*/
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
    $('#f :checkbox').change(function() {
    // this will contain a reference to the checkbox   
    if (this.checked) {
        // the checkbox is now checked 
        var icd='#'+$(this).attr('name');
                $(icd).addClass('text-primary');
    } else {
        // the checkbox is now no longer checked
        var icd='#'+$(this).attr('name');
                $(icd).removeClass('text-primary');
    }
});

   
        
        });