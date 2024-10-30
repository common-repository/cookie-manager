jQuery(document).ready(function( $ ) {  
    //Load color picker
    $('.wcm-color-field').wpColorPicker();

    //Handle "Accept All" notice bar button.
    $('#download_accepted_cookies_log_file').click(function(e){
        const year = new Date().getFullYear();
        e.preventDefault();  //stop the browser from following
        var file_path = wcmAdminScript.pluginsUrl + "/cookie-manager/admin/accepted-cookies-log/"+year+"/wp-cookie-manager-accepted-cookies-log.csv";
        if (UrlExists(file_path)) {
            var a = document.createElement('A');
            a.href = file_path;
            a.download = file_path.substr(file_path.lastIndexOf('/') + 1);
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        } else {
            alert('Sorry, the log file is empty.');
        }

    });

    $('#accepted_cookies_log').change(function() {
        if(this.checked) {
            $('#accepted_cookies_log').val('true');
        } else {
            $('#accepted_cookies_log').val('false');
        }     
    });
});

function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}
