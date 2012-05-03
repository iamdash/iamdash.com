$( document ).ready( function() {
    scaleText();
    $('.slidewrap2').carousel({
            slider: '.slider',
            slide: '.slide',
            addNav: false,
            addPagination: true,
            speed: 2000,
            slideHed: true
    });
    $('nav, .up-down').localScroll({
		//target: '#content', // could be a selector or a jQuery object too.
		queue:true,
		duration:500,
		hash:true,
                easing: 'easeOutCirc',
		onBefore:function( e, anchor, $target ){
			// The 'this' is the settings object, can be modified
		},
		onAfter:function( anchor, settings ){
			// The 'this' contains the scrolled element (#content)
		}
	});    
        $('.up-down').css({
            'opacity': 0.2,
            'z-index': 999
        });
        $('.row').each(function(){
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
        /*$('#project-thumbs img').each(function(){
            var the_image = $(this);           
            the_image.live('mouseenter',function(){
                the_image.animate({
                    'opacity':1
                })
            });
            the_image.live('mouseleave',function(){
                if(!$(this).hasClass('highlighted')){
                    the_image.animate({
                    'opacity':0.2
                    })
                }
                
            });
        });*/
        //$('#project-images img').fadeTo(100,1);
        $('.section-nav a').each(function(){
           $(this).click(function(e){
               e.preventDefault();
               var the_link = $(this);
               $('.section-nav a').removeClass('active');
               the_link.addClass('active');
               var skill_type = the_link.attr('rel');
               console.log(skill_type)
               $('#project-images img').animate({
                   'opacity':0.2
               },100, function(){
                   $('#project-images img.'+skill_type).animate({
                        'opacity':1
                    },100)
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