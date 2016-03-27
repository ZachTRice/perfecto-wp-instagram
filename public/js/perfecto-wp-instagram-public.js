(function( $ ) {
	var access_token = "16384709.6ac06b4.49b97800d7fd4ac799a2c889f50f2587",
	    access_parameters = {
	        access_token: access_token
	    };
	   

	function grabImages(tag, count, access_parameters) {
	    var instagramUrl = 'https://api.instagram.com/v1/tags/' + tag + '/media/recent?callback=?&count=' + count;
	    $.getJSON(instagramUrl, access_parameters, onDataLoaded);
	}

	function onDataLoaded(instagram_data) {
	    var target = $("#perfecto_instagram ul");
	    //console.log(instagram_data);
	    if (instagram_data.meta.code == 200) {
	        var photos = instagram_data.data;
	        //console.log(photos);
	        if (photos.length > 0) {
	            target.empty();
	            for (var key in photos) {
	                var photo = photos[key];
	                target.append('<li><a href="' + photo.link + '" target="_blank"><img src="' + photo.images.standard_resolution.url + '"></a></li>')
	            }
	        } else {
	            target.html("nothing found");
	        }
	    } else {
	        var error = instagram_data.meta.error_message;
	        target.html(error);
	    }
	}

	$( document ).ready(function() {
		var mytag = $('#perfecto_instagram').data("tag");
		var myphotos = $('#perfecto_instagram').data("photos");
		grabImages(mytag, myphotos, access_parameters);
	});
	

})( jQuery );
