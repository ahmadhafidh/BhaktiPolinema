/* Customizer JS Upsale*/
( function( api ) {

	api.sectionConstructor['upsell'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


jQuery(document).ready(function($){

    wp.customize.section( 'sidebar-widgets-newsreaders-homepage-sidebar' ).panel( 'newsreaders_home_panel' );
    wp.customize.section( 'sidebar-widgets-newsreaders-homepage-sidebar' ).priority( newsreaders_customizer.key_sidebar );

    /* Home page redirect */
    wp.customize.panel( 'newsreaders_home_panel', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( newsreaders_customizer.home_url );
            }
        });
    });

    // Color Schema
    $( '#customize-control-newsreaders_color_schema .color-scheme-picker input' ).live( 'change', function() {

        if ( $( this ).is( ':checked' ) ) {

            var currentColor = this.value;

            var data = {
                'action': 'newsreaders_color_schema_color',
                'currentColor': currentColor,
            };
     
            $.post( ajaxurl, data, function(response) {

                if( response ){

                    //Get the list of settings to update, and their colors
                    var colors = JSON.parse( response );

                    // Loop over them
                    for ( var color in colors ) {
                        if ( ! colors.hasOwnProperty( color ) ) {
                            continue;
                        }

                        var colorName = color,
                            colorValue = colors[color];

                        // Update the color settings
                        wp.customize( colorName, function( colorSetting ) {
                            colorSetting.set( colorValue );
                        } );

                    }

                }

            });

        }

    } );


    // Tygoraphy
	$('#_customize-input-newsreaders_heading_font').change(function(){

		var currentfont = this.value;

		var data = {
            'action': 'newsreaders_customizer_font_weight',
            'currentfont': currentfont,
            '_wpnonce': newsreaders_customizer.ajax_nonce,
        };
 
        $.post( ajaxurl, data, function(response) {

            if( response ){

                $('#_customize-input-newsreaders_heading_weight').empty();
                $('#_customize-input-newsreaders_heading_weight').html(response);

            }

        });

	});	

	// Archive Layout Image Control
    $('.radio-image-buttenset').each(function(){
        
        id = $(this).attr('id');
        $( '[id='+id+']' ).buttonset();
    });

    function newsreaders_reorder_sections( container ){

        var sections = [];
        var sectionName;
        $( container+' .control-section' ).each(function(){

            sectionName = $(this).attr('aria-owns');
            sectionName = sectionName.replace( "sub-accordion-section-", "");
            sections.push(sectionName);
        });
        var sections = sections.toString();

        var data = {
            'action': 'newsreaders_reorder_home_section',
            'sections': sections,
            '_wpnonce': newsreaders_customizer.ajax_nonce,
        };

        $.post( ajaxurl, data, function(response) {
            wp.customize.previewer.refresh();

        });

    }

    $('#sub-accordion-panel-newsreaders_home_panel').sortable({
      axis: 'y',
      update: function( event, ui ) {

        newsreaders_reorder_sections( '#sub-accordion-panel-newsreaders_home_panel' );

      },

    });

});