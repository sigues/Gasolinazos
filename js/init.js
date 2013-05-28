  window.fbAsyncInit = function() {
  FB.init({
    appId      : '465561006870893', // App ID
    channelUrl : 'http://localhost/gasolinazos/js/channel.html', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
//      testAPI();
console.log("conectado");
      regData();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      console.log("no autorizado");
      FB.login();
    } else {
        console.log("no tiene sesion en fb");
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });

FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // the user is logged in and has authenticated your
    // app, and response.authResponse supplies
    // the user's ID, a valid access token, a signed
    // request, and the time the access token 
    // and signed request each expire
    var uid = response.authResponse.userID;
    var accessToken = response.authResponse.accessToken;
          console.log("conectado");
  } else if (response.status === 'not_authorized') {
    // the user is logged in to Facebook, 
    // but has not authenticated your app
          console.log("no autorizado");
  } else {
      $.ajax(
        {
            url: $("#base_url").val()+"index.php/gasolinazos/lo",
            type: "post",
            dataType: "html",
            data:{
                id : "lo"
            },
            success: function( strData ){
//                        $("#div-ciudad").html(strData);
//                        readyCiudad();
                        $("#fb_loginbutton").show();
            }
        }							
      );
      console.log("no conectado");
    // the user isn't logged in to Facebook.
  }
 }); 

  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
        for(var propertyName in response) {
            // propertyName is what you want
            // you can get the value like this: myObject[propertyName]
      console.log(propertyName+" : "+response[propertyName]);
            
         }
      console.log('Good to see you, ' + response.name + '.');
    });
  }
  
  function regData(){
          var respuesta
          FB.api('/me', function(response) {
               respuesta = response;
                $.ajax(
                {
                    url: $("#base_url").val()+"index.php/gasolinazos/regDat",
                    type: "post",
                    dataType: "html",
                    data:{
                        id : respuesta.id,
                        name : respuesta.name,
                        first_name : respuesta.first_name,
                        middle_name : respuesta.middle_name,
                        last_name : respuesta.last_name,
                        link : respuesta.link,
                        username : respuesta.username,
                        gender : respuesta.gender,
                        timezone : respuesta.timezona,
                        locale : respuesta.locale,
                        verified : respuesta.verified,
                        updated_time : respuesta.updated_time
                    },
                    success: function( strData ){
//                        $("#div-ciudad").html(strData);
//                        readyCiudad();
                      //      $("#fb_loginbutton").hide();
                    }
                }							
              );

          });

  }

