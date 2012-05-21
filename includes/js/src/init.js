$(window).ready(function(){
    setTimeout(function(){
    // Hide the address bar!
    window.scrollTo(0, 1);
  }, 0);
})
$( document ).ready( function() {
    doInView();
    modalOverlay();
    $('a').tipsy({
        gravity: 's',
        fade: true
    });
    $('#page-header nav, .up-down, p').localScroll({
        queue:true,
        duration: 1500,
        hash:true,
        easing: 'easeOutBounce',
        onBefore:function( e, anchor, $target ){

        },
        onAfter:function( anchor, settings ){
            var hash = window.location.hash;
            $('#page-header nav a').removeClass('active');
            $('#page-header nav a[href='+hash+']').addClass('active');				
        }
    });    
    $('.up-down').css({
        'opacity': 0.2
    });
    $('.row').not('.jqmWindow').each(function(){
        var the_row = $(this);
        var up_down = the_row.find($('.up-down'))            
        the_row.mouseenter(function(){
            up_down.animate({
                'opacity':1
            },100);
        });
        the_row.mouseleave(function(){
            up_down.animate({
                'opacity':0.2
            },100);
        });
    })

    $('#project-images img').fadeTo(100,0.2);
    $('#work .section-nav a').each(function(){
        var the_nav = $(this);
        $(this).click(function(e){
            $('*').removeClass('active-project');
            e.preventDefault();
            var the_link = $(this);
            $('#work .section-nav a').removeClass('active');
            the_link.addClass('active');
            var skill_type = the_link.attr('rel');

            $('#project-images img').animate({
                'opacity':0.2
            },100, function(){
					
                $('#project-images img.'+skill_type).addClass('active-project').animate({
                    'opacity':1
                },100, function(){
                })
            })
        }) 
    }); 

});


function scaleText(){
    var $body = $('body'); //Cache this for performance

    var setBodyScale = function() {
        var scaleSource = $body.width(),
        scaleFactor = 0.35,                     
        maxScale = 300,
        minScale = 100; //Tweak these values to taste

        var fontSize = scaleSource * scaleFactor; //Multiply the width of the body by the scaling factor:

        if (fontSize > maxScale) fontSize = maxScale;
        if (fontSize < minScale) fontSize = minScale; //Enforce the minimum and maximums

        $('#intro h2').css('font-size', fontSize + '%');
    }

    $(window).resize(function(){
        setBodyScale();
    });

    //Fire it when the page first loads:
    setBodyScale();    
}

function doInView(){
    $('article.row').bind('inview', function (event, visible) {
        if (visible == true) {
            $('#page-header nav a').removeClass('active');
            $('#page-header nav a[href=#'+$(this).attr('id')+']').addClass('active');
        }
    });	
}

function modalOverlay(){
 
    $('#project-display').jqm({
        ajax: '@rel',
        trigger: '.overlay',
        onShow: showDialog,
        onHide: hideDialog
    }); 

}
var showDialog=function(hash){ 
    console.log(hash)
    //if($(hash.t).hasClass('active-project')){
        hash.w.fadeIn(100, function(){
            $('.up-down a').fadeOut(100);
        });
    //}

};
var hideDialog=function(hash) { 
    hash.w.fadeOut('2000',function(){ 
        hash.o.remove();
        $('.up-down a').fadeIn(500);
    }); 
}; 
