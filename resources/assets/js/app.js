
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    created(){
        Echo.channel('channelSignaalEvent')
            .listen('SignaalEvent', (e) => {
                //console.log(e);
                var timestamp = e.timestamp;
                var uv = e.uv;
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: '/addUserHistory',
                    data: {
                        _token: CSRF_TOKEN,
                        signaal:e.timestamp
                    },
                    success: function(e) {
                        if(e == 1){ // succesfull added to userhistory -> change view
                            //console.log('change the view');
                            changeStamp(timestamp);
                            changeUv(uv)
                        }
                    }
                })

    });
    }
});

function changeStamp(timestamp){
    $('.signaal_created_at').text(timestamp);
}
function changeUv(uv){
    $('.signaal_uv').text(uv);
    $('.signaal_uv_groot').text(Math.round(uv));

    var logo = $('#sun_logo');
    var white = $('#temp_bar .white');
    var blue = $('#temp_bar .blue')
    var lightblue = $('#temp_bar .lightblue')
    var green = $('#temp_bar .green');
    var yellow = $('#temp_bar .yellow');
    var orange = $('#temp_bar .orange');
    var red = $('#temp_bar .red');
    var black = $('#temp_bar .black');
    switch( true ){
        case ( Math.round(uv) < 2 ):
            logo.css('color', 'gray');
            white.css('display', 'inline-block');
            blue.css('display', 'none');
            lightblue.css('display', 'none');
            green.css('display', 'none');
            yellow.css('display', 'none');
            orange.css('display', 'none');
            red.css('display', 'none');
            black.css('display', 'none');
            break;
        case ( Math.round(uv) < 3 ):
            logo.css('color', 'blue');
            white.css('display', 'inline-block');
            blue.css('display', 'inline-block');
            lightblue.css('display', 'none');
            green.css('display', 'none');
            yellow.css('display', 'none');
            orange.css('display', 'none');
            red.css('display', 'none');
            black.css('display', 'none');
            break;
        case ( Math.round(uv) < 4 ):
            logo.css('color', 'lightblue');
            white.css('display', 'inline-block');
            blue.css('display', 'inline-block');
            lightblue.css('display', 'inline-block');
            green.css('display', 'none');
            yellow.css('display', 'none');
            orange.css('display', 'none');
            red.css('display', 'none');
            black.css('display', 'none');
            break;
        case ( Math.round(uv) < 5 ):
            logo.css('color', 'green');
            white.css('display', 'inline-block');
            blue.css('display', 'inline-block');
            lightblue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'none');
            orange.css('display', 'none');
            red.css('display', 'none');
            black.css('display', 'none');
            break;
        case ( Math.round(uv) < 6 ):
            logo.css('color', 'yellow');
            white.css('display', 'inline-block');
            blue.css('display', 'inline-block');
            lightblue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'inline-block');
            orange.css('display', 'none');
            red.css('display', 'none');
            black.css('display', 'none');
            break;
        case ( Math.round(uv) < 7 ):
            logo.css('color', 'orange');
            white.css('display', 'inline-block');
            blue.css('display', 'inline-block');
            lightblue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'inline-block');
            orange.css('display', 'inline-block');
            red.css('display', 'none');
            black.css('display', 'none');
            break;
        case ( Math.round(uv) < 8 ):
            console.log('red');
            logo.css('color', 'red');
            white.css('display', 'inline-block');
            blue.css('display', 'inline-block');
            lightblue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'inline-block');
            orange.css('display', 'inline-block');
            red.css('display', 'inline-block');
            black.css('display', 'none');
        break;
        case ( Math.round(uv) < 12 ):
            console.log('black');
            logo.css('color', 'black');
            white.css('display', 'inline-block');
            blue.css('display', 'inline-block');
            lightblue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'inline-block');
            orange.css('display', 'inline-block');
            red.css('display', 'inline-block');
            black.css('display', 'inline-block');
            break;
        default:
            console.log('error');
            break


    }


}
