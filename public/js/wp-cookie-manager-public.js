jQuery(document).ready(function( $ ) {  
    
    var cookieSettings = gdprCookieAdvisorInit(); 
    
    gcaBlockCookies(cookieSettings);

    //NOTICE BAR
    //Open notice bar if cookie dosen't exist yet.
    if(!gcaGdprCookieAdvisorCookieExists()) {
        $('#wp-cookie-manager-cookie-notice-container').fadeIn(300); 
    }
    //Open popup when click on configure cookies button.
    $('#wp-cookie-manager-open-cookie-settings').click(function(){
        $('#wp-cookie-manager-cookie-settings-popup').fadeIn(300);
    });

    //Handle "Dismiss" notice.
    $('#wp-cookie-manager-dismiss').click(function(){
        $('#wp-cookie-manager-cookie-notice-container').fadeOut(300);  
    });

    //Handle "Accept All" notice bar button.
    $('#wp-cookie-manager-cookie-accept-notice').click(function(){
        $('#wp-cookie-manager-cookie-notice-container').fadeOut(300); 
        cookieSettings.essentialEnabled = true;
        cookieSettings.analyticsEnabled = true;
        cookieSettings.externalEnabled = true;
        cookieSettings.lastUpdate = new Date().toISOString();
        var settings = JSON.stringify(cookieSettings);
        gcaSetCookie("wp-cookie-manager-settings", settings, 365);
        gcaSetAcceptedCookiesLog(); 
    });

    //SETTINGS
    //Handle "Close(X)" settings button.
    $('#close-pop-up').click(function(){
        $('#wp-cookie-manager-cookie-settings-popup').fadeOut(300); 
    });

    //Handle "Accept all Cookies" settings button.
    $('#wp-cookie-manager-cookie-settings-popup-buttons-accept-all').click(function(){
        $('#wp-cookie-manager-cookie-settings-popup').fadeOut(300);
        $('#wp-cookie-manager-cookie-notice-container').fadeOut(300); 
        cookieSettings.essentialEnabled = true;
        cookieSettings.analyticsEnabled = true;
        cookieSettings.externalEnabled = true;
        cookieSettings.lastUpdate = new Date().toISOString();
        var settings = JSON.stringify(cookieSettings);
        gcaSetCookie("wp-cookie-manager-settings", settings, 365);
        gcaSetAcceptedCookiesLog(); 
    });

    //Handle "Save" settings button.
    $('#wp-cookie-manager-cookie-settings-popup-buttons-save').click(function(){
        $('#wp-cookie-manager-cookie-settings-popup').fadeOut(300); 
        $('#wp-cookie-manager-cookie-notice-container').fadeOut(300); 
        cookieSettings.lastUpdate = new Date().toISOString();
        var settings = JSON.stringify(cookieSettings);
        gcaSetCookie("wp-cookie-manager-settings", settings, 365);
        gcaSetAcceptedCookiesLog(); 
    });

    //SETTINGS NAVIGATION
    //Handle "Como usamos las cookies" settings button.
    $('#wcm-how-we-use-cookies-button').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch" ).removeClass("wcm-flex");
        if(!$('#wcm-how-we-use-cookies-button').hasClass("active")){
            
            $( "#cookie-settings-section-text__use" ).show();
            $( "#cookie-settings-section-text__essential" ).hide();
            $( "#cookie-settings-section-text__analytics" ).hide();
            $( "#cookie-settings-section-text__external" ).hide();
            $( "#cookie-settings-section-text__privacy_policy" ).hide();


            $( "#cookie-settings-section-selector button" ).removeClass( "active" );
            $( "#wcm-how-we-use-cookies-button" ).addClass("active");    
        };
        
    });
    $('#wcm-how-we-use-cookies-button-mobile').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-mobile" ).removeClass("wcm-flex");
        if(!$('#wcm-how-we-use-cookies-button-mobile').hasClass("active")){
            $( "#wcm-how-we-use-cookies-container-mobile" ).addClass("active");
            $( "#wcm-essential-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-analytics-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-external-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-privacy-policy-container-mobile" ).removeClass("active");   
        };
        var container = $('#pop-up'),
        scrollTo = $('#wp-cookie-manager-cookie-settings-popup-title');

        if (container.length) {
            container.scrollTop(
                scrollTo.offset().top - container.offset().top + container.scrollTop() - 25
            ); 
        }
    });

    //Handle "Cookies Esenciales" settings button.
    $('#wcm-essential-cookies-button').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential input" ).prop('disabled', true);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential input" ).prop('checked', cookieSettings.essentialEnabled);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential" ).addClass("wcm-flex");
        if(!$('#wcm-essential-cookies-button').hasClass("active")){
            

            $( "#cookie-settings-section-text__use" ).hide();
            $( "#cookie-settings-section-text__essential" ).show();
            $( "#cookie-settings-section-text__analytics" ).hide();
            $( "#cookie-settings-section-text__external" ).hide();
            $( "#cookie-settings-section-text__privacy_policy" ).hide();


            $( "#cookie-settings-section-selector button" ).removeClass( "active" );
            $( "#wcm-essential-cookies-button" ).addClass("active"); 
        };
    });
    $('#wcm-essential-cookies-button-mobile').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential-mobile input" ).prop('disabled', true);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential-mobile input" ).prop('checked', cookieSettings.essentialEnabled);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential-mobile" ).addClass("wcm-flex");
        if(!$('#wcm-essential-cookies-button-mobile').hasClass("active")){
            $( "#wcm-how-we-use-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-essential-cookies-container-mobile" ).addClass("active");
            $( "#wcm-analytics-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-external-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-privacy-policy-container-mobile" ).removeClass("active"); 
        };

        var container = $('#pop-up'),
        scrollTo = $('#wp-cookie-manager-cookie-settings-popup-title');

        if (container.length) {
            container.scrollTop(
                scrollTo.offset().top - container.offset().top + container.scrollTop() - 25
            ); 
        }
        
    });

    //Handle "Cookies de anilitica" settings button.
    $('#wcm-analytics-cookies-button').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics input" ).prop('disabled', false);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics input" ).prop('checked', cookieSettings.analyticsEnabled);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics" ).addClass("wcm-flex");
        if(!$('#wcm-analytics-cookies-button').hasClass("active")){

            $( "#cookie-settings-section-text__use" ).hide();
            $( "#cookie-settings-section-text__essential" ).hide();
            $( "#cookie-settings-section-text__analytics" ).show();
            $( "#cookie-settings-section-text__external" ).hide();
            $( "#cookie-settings-section-text__privacy_policy" ).hide();

            $( "#cookie-settings-section-selector button" ).removeClass( "active" );
            $( "#wcm-analytics-cookies-button" ).addClass("active");
        };
    });
    $('#wcm-analytics-cookies-button-mobile').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics-mobile input" ).prop('disabled', false);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics-mobile input" ).prop('checked', cookieSettings.analyticsEnabled);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics-mobile" ).addClass("wcm-flex");

        if(!$('#wcm-analytics-cookies-button-mobile').hasClass("active")){
            $( "#wcm-how-we-use-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-essential-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-analytics-cookies-container-mobile" ).addClass("active"); 
            $( "#wcm-external-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-privacy-policy-container-mobile" ).removeClass("active"); 
        };
        var container = $('#pop-up'),
        scrollTo = $('#wp-cookie-manager-cookie-settings-popup-title');

        if (container.length) {
            container.scrollTop(
                scrollTo.offset().top - container.offset().top + container.scrollTop() - 25
            ); 
        }
    });

    //Handle "Cookies externas" settings button.
    $('#wcm-external-cookies-button').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external input" ).prop('disabled', false);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external input" ).prop('checked', cookieSettings.externalEnabled);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external" ).addClass("wcm-flex");
        if(!$('#wcm-external-cookies-button').hasClass("active")){
            
            $( "#cookie-settings-section-text__use" ).hide();
            $( "#cookie-settings-section-text__essential" ).hide();
            $( "#cookie-settings-section-text__analytics" ).hide();
            $( "#cookie-settings-section-text__external" ).show();
            $( "#cookie-settings-section-text__privacy_policy" ).hide();

            $( "#cookie-settings-section-selector button" ).removeClass( "active" );
            $( "#wcm-external-cookies-button" ).addClass("active");
        };
    });
    $('#wcm-external-cookies-button-mobile').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external-mobile input" ).prop('disabled', false);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external-mobile input" ).prop('checked', cookieSettings.externalEnabled);
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external-mobile" ).addClass("wcm-flex");
        if(!$('#wcm-external-cookies-button-mobile').hasClass("active")){
            $( "#wcm-how-we-use-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-essential-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-analytics-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-external-cookies-container-mobile" ).addClass("active"); 
            $( "#wcm-privacy-policy-container-mobile" ).removeClass("active"); 
        };
        var container = $('#pop-up'),
        scrollTo = $('#wp-cookie-manager-cookie-settings-popup-title');

        if (container.length) {
            container.scrollTop(
                scrollTo.offset().top - container.offset().top + container.scrollTop() - 25
            ); 
        }
    });

    //Handle "Politica de privacidad" settings button.
    $('#wcm-privacy-policy-button').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics" ).removeClass("wcm-flex");
        if(!$('#wcm-privacy-policy-button').hasClass("active")){
            
            $( "#cookie-settings-section-text__use" ).hide();
            $( "#cookie-settings-section-text__essential" ).hide();
            $( "#cookie-settings-section-text__analytics" ).hide();
            $( "#cookie-settings-section-text__external" ).hide();
            $( "#cookie-settings-section-text__privacy_policy" ).show();

            $( "#cookie-settings-section-selector button" ).removeClass( "active" );
            $( "#wcm-privacy-policy-button" ).addClass("active");      
        };
    });
    $('#wcm-privacy-policy-button-mobile').click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-essential-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external-mobile" ).removeClass("wcm-flex");
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics-mobile" ).removeClass("wcm-flex");
        if(!$('#wcm-privacy-policy-button-mobile').hasClass("active")){
            $( "#wcm-how-we-use-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-essential-cookies-container-mobile" ).removeClass("active");
            $( "#wcm-analytics-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-external-cookies-container-mobile" ).removeClass("active"); 
            $( "#wcm-privacy-policy-container-mobile" ).addClass("active"); 
        };
        var container = $('#pop-up'),
        scrollTo = $('#wp-cookie-manager-cookie-settings-popup-title');

        if (container.length) {
            container.scrollTop(
                scrollTo.offset().top - container.offset().top + container.scrollTop() - 25
            ); 
        }
    });

    //Handle "Essential Switch" settings button.
    $( "#wp-cookie-manager-cookie-settings-popup-switch-essential input" ).click(function(){

    });

    //Handle " Analytics Switch" settings button.
    $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics input" ).click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-analytics input" ).prop('checked', !cookieSettings.analyticsEnabled);
        cookieSettings.analyticsEnabled = !cookieSettings.analyticsEnabled;
    });

    //Handle "External switch" settings button.
    $( "#wp-cookie-manager-cookie-settings-popup-switch-external input" ).click(function(){
        $( "#wp-cookie-manager-cookie-settings-popup-switch-external input" ).prop('checked', !cookieSettings.externalEnabled);
        cookieSettings.externalEnabled = !cookieSettings.externalEnabled;
    });

}); 

//COOKIES
function gdprCookieAdvisorInit() {
    if(gcaGetCookie("wp-cookie-manager-settings") !== ""){
        return JSON.parse(gcaGetCookie("wp-cookie-manager-settings"));
    } else {
        return {
            essentialEnabled: true,
            analyticsEnabled: false,
            externalEnabled: false,
            lastUpdate: ""
        }
    }
}

function gcaSetCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function gcaGetCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function gcaGdprCookieAdvisorCookieExists() {
    var settings = gcaGetCookie("wp-cookie-manager-settings");
    if (settings != "") {
        return true;
    } else {
        return false;
    }
}

function gcaPrepareAcceptedCookiesLogData() {
    var date = new Date().toISOString();
    var cookie = JSON.parse(gcaGetCookie("wp-cookie-manager-settings"));
    var analyticsEnabled = cookie.analyticsEnabled && cookie.analyticsEnabled === true ? "yes" : "no" ;
    var essentialEnabled = cookie.essentialEnabled && cookie.essentialEnabled === true ? "yes" : "no";
    var externalEnabled = cookie.externalEnabled && cookie.externalEnabled === true ? "yes" : "no";

    return (
        "[email]," + 
        date + "," + 
        essentialEnabled + "," + 
        analyticsEnabled + ","+ 
        externalEnabled +"\n"
    );
}

function gcaSetAcceptedCookiesLog() {

    var ajax_data = "";
    var user_ip = "";
    var restOfData = gcaPrepareAcceptedCookiesLogData();

    //GET DATA
    jQuery.getJSON('https://api.ipify.org?format=json', function(data){
        user_ip = data.ip + ",";
        ajax_data = user_ip + restOfData;
        wcmExecuteAjaxCall(ajax_data);

    }).catch(function (errorThrown) {
        user_ip = errorThrown + ",";
        ajax_data = user_ip + restOfData;
        wcmExecuteAjaxCall(ajax_data);
    });
}

//AJAX CALL
function wcmExecuteAjaxCall(ajax_data) {
    jQuery.ajax({
        type : "post",
        url : wcmPublicScript.ajax_url,
        data :         {
            action: "add_to_log", 
            data : ajax_data
        },
        error: function(response){
            console.log('ERROR:');
            console.log(response);
        },
        success: function(response) {
            console.log('Log updated:');
            console.log(response);
        }
    });
}

function gcaGetAnalyticsCookieNames(cookieSettings) {
    var analytics_cookies = false;
    if(cookieSettings.analyticsEnabled === false){
        analytics_cookies = document.getElementById("analytics_cookie_names").textContent.replace(/ /g,'');
    }
    return analytics_cookies;
}

function gcaGetExternalCookieNames(cookieSettings) {
    var third_party_cookies = false;
    if(cookieSettings.externalEnabled === false){
        third_party_cookies = document.getElementById("external_cookie_names").textContent.replace(/ /g,'');
    }
    return third_party_cookies;
}

function gcaMergeCookieNames(analytics_cookies, third_party_cookies) {
    var cookies_not_allowed = [];
    var cookies_not_allowed_string = "";
    cookies_not_allowed_string = analytics_cookies != false ? cookies_not_allowed_string + analytics_cookies : cookies_not_allowed_string;
    cookies_not_allowed_string = analytics_cookies != false && third_party_cookies != false ? cookies_not_allowed_string + "," : cookies_not_allowed_string;
    cookies_not_allowed_string = third_party_cookies != false ? cookies_not_allowed_string + third_party_cookies: cookies_not_allowed_string;
    cookies_not_allowed = cookies_not_allowed_string !== "" ? cookies_not_allowed_string.split(","): cookies_not_allowed;
    return cookies_not_allowed;
}

function gcaCookieExists(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
} 

function gcaRemoveCookie(name) {
  console.log("Removing cookie: " + name);
  document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
}

function gcaClearNotAllowedExistingCookies(cookies_not_allowed) {
    cookies_not_allowed.forEach(cookie_name => {
        var cookie = gcaCookieExists(cookie_name);
        if (cookie != null) {
            gcaRemoveCookie(cookie_name);
        }  
    });
}

function gcaBlockCookies(cookieSettings) {
    console.log('Trying to block Cookies...');
    var analytics_cookies   = gcaGetAnalyticsCookieNames(cookieSettings);
    var third_party_cookies = gcaGetExternalCookieNames(cookieSettings);
    var cookies_not_allowed = gcaMergeCookieNames(analytics_cookies, third_party_cookies);
    console.log(cookieSettings.analyticsEnabled);
    console.log(cookieSettings.externalEnabled);
    console.log(cookies_not_allowed);
    gcaClearNotAllowedExistingCookies(cookies_not_allowed);

    /* COOKIE PROXY */
    var cookieDesc = Object.getOwnPropertyDescriptor(Document.prototype, 'cookie') ||
            Object.getOwnPropertyDescriptor(HTMLDocument.prototype, 'cookie');
    if (cookieDesc && cookieDesc.configurable) {
        Object.defineProperty(document, 'cookie', {
            get: function () {                
                return cookieDesc.get.call(document);
            },
            set: function (val) {
                var split = val.split('=');
                var cname = split[0].trim();

                if (cookies_not_allowed.includes(cname)) {
                    console.log('cookie blocked :' + cname);
                } else {
                    cookieDesc.set.call(document, val);
                }
            }
        });
    }

    

}
