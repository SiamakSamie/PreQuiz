// this requires an input field with the name refresh, with the initial value "no"

// this section here makes sure the page is refreshed, even when the back button is pressed instead of
// a proper redirection. This solves the problem of having non-updated data after backing to this page
var $input = $('#refresh');

if($input.val() == 'yes') {
    $(document.body).html("");  	 // this is to get rid of the blinking effect while refreshing
    document.location.reload(true);  // this will reload the new content from the database
}
else
	$input.val('yes');

