jQuery(document).ready(function($) {
        
        function scrollTop() {
            $("html, body").animate({ scrollTop: 0 }, 300);
        };

        function WidgetActive() {
            if($('body').hasClass('search--active')) {
                $('body').removeClass('widget--active');
            } else {
            if($('body').hasClass('widget--active')) {
                $('body').removeClass('search--active');
            }
            return false;
            }
        }

        function SearchIcon() {
            $('#search-icon').toggleClass('is--active');
            if($('body').hasClass('widget--active')) {
                $('body').removeClass('widget--active');
            }
            $('body').toggleClass('search--active');
            $('.search-box').slideToggle('fast');
            $('#menu-icon').removeClass('is--active');
            $('.widget-box').hide();
            $( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');
            $('#menu-icon').attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');
            return false;
        }

        function MenuIcon() {
            $("#menu-icon").toggleClass('is--active');
            $('body').toggleClass('widget--active');
            $('.widget-box').slideToggle('fast');
            $('#search-icon').removeClass('is--active');
            $('.search-box').hide();
            $( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');
            $('#search-icon').attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');
            if($('body').hasClass('search--active')) {
                $('body').removeClass('search--active');
            }                
            return false;
        }

        // Search toggle
        $('#search-icon').click( function( e ) {
            e.preventDefault();
            $(this).toggleClass('rooooooooooooooooooooooooooooooooooooooooooool');
            scrollTop();
            WidgetActive();
            SearchIcon();
        } );

        // Menu toggle
        $('#menu-icon').click( function( e ) {
            e.preventDefault();
            $(this).toggleClass('rooooooooooooooooooooooooooooooooooooooooooool');
            scrollTop();
            WidgetActive();
            MenuIcon();
        } ); 

        // Smooth scroll to top
        $('#scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 1600);
        return false;
        });

        // Add dropdown toggle that display child menu items.
        $( '.main-navigation .page_item_has_children > a, .main-navigation .menu-item-has-children > a' ).append( '<button class="dropdown-toggle" aria-expanded="false"/>' );

        $( '.dropdown-toggle' ).click( function( e ) {
            e.preventDefault();
            $( this ).toggleClass( 'toggle-on' );
            $( this ).parent().next( '.children, .sub-menu' ).toggleClass( 'toggle-on' );
            $( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) == 'false' ? 'true' : 'false');
        } ); 
      
});
