var botBensonWindowsWeb = {

	nowDrag: null,
	draggable: false,
    entityAutoIncreament: 0,
    //entity: {"settings":{"height":90,"width":70},"bonjour":{"name":"bonjour","image":"bonjour.png"}},
    entity: function() {
        $.getJSON('include/json/desktop.php', function(data) {
            return data
        });
    },
    dragAndDropChange: function( type )
	{
		botBensonWindowsWeb.draggable = type == true ? true : false;
	},
	createEntity: function( entity , coordinate , entityName = '' )
	{		
		var coor   = botBensonWindowsWeb.entityCoordinate( coordinate.top , coordinate.left );
		var entity = botBensonWindowsWeb.entity[ entity ];
		var name   = entityName == "" ? entity.name : entityName;
		var height = botBensonWindowsWeb.entity.settings.height;
		var width  = botBensonWindowsWeb.entity.settings.width;


		var html = '<div class="icon-desktop" style="height:' + height + 'px;width:' + width + 'px; top:' + coor.top + 'px;left:' + coor.left + 'px" data-id="'+botBensonWindowsWeb.entityAutoIncreament+'"><a href="#">';
		html += '<img src="' + entity.image +'">';
		html += '<span>' + name +'</span></a></div>';

		$(".icons-dekstop").append( html );


		$( ".icon-desktop[data-id='"+botBensonWindowsWeb.entityAutoIncreament+"']" ).draggable({
			start: function( event , ui ){

				botBensonWindowsWeb.nowDrag = $(this);

			},
		  	stop: function( event, ui ) {

		  		if( botBensonWindowsWeb.nowDrag == null )
		  			return;

		  		var coor = botBensonWindowsWeb.entityCoordinate( ui.position.top , ui.position.left );

		  		botBensonWindowsWeb.nowDrag.css( { top : coor.top + 'px' , left : coor.left + 'px'} );
		  		botBensonWindowsWeb.nowDrag = null;

		  	}		  	
		});
	},

	entityCoordinate: function( entTop , entLeft )
	{

  		var heightDesktopIcon = botBensonWindowsWeb.entity.settings.height;
  		var widthDesktopIcon  = botBensonWindowsWeb.entity.settings.width;

		var top  = entTop - ( entTop % heightDesktopIcon ); 
		var left = entLeft - ( entLeft % widthDesktopIcon ); 
  		
		if( entTop % heightDesktopIcon >= heightDesktopIcon / 2  )
			top += heightDesktopIcon;

		if( entLeft % widthDesktopIcon >= widthDesktopIcon / 2  )
			left += widthDesktopIcon;

		return {
			top : top ,
			left: left,
		};

	}
};