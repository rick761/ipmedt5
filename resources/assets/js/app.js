
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

    var logo = $('#sun_logo');
    var blue = $('#temp_bar .blue');
    var green = $('#temp_bar .green');
    var yellow = $('#temp_bar .yellow');
    var orange = $('#temp_bar .orange');
    var red = $('#temp_bar .red');
    switch( true ){

        case ( uv < 3 ):
        //case 1:
        //case 2:
            console.log('blue');
            logo.css('color', 'blue');
            blue.css('display', 'inline-block');
            red.css('display', 'none');
            green.css('display', 'none');
            yellow.css('display', 'none');
            red.css('display', 'none');
            break;
        case ( uv < 5 ):
        //case 3:
        //case 4:
            console.log('green');
            logo.css('color', 'green');
            blue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'none');
            orange.css('display', 'none');
            red.css('display', 'none');

            break;
        case ( uv < 7 ):
        //case 5:
        //case 6:
            console.log('yellow');
            logo.css('color', 'yellow');
            blue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'inline-block');
            orange.css('display', 'none');
            red.css('display', 'none');

            break;
        case ( uv < 9 ):
            console.log('orange');
        //case 7:
        //case 8:
            logo.css('color', 'orange');
            blue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'inline-block');
            orange.css('display', 'inline-block');
            red.css('display', 'none');

            break;
        case ( uv < 12 ):
        //case 9:
        //case 10:
        //case 11:
            console.log('red');
            logo.css('color', 'red');
            blue.css('display', 'inline-block');
            green.css('display', 'inline-block');
            yellow.css('display', 'inline-block');
            orange.css('display', 'inline-block');
            red.css('display', 'inline-block');

            break;
        default:
            console.log('error');
            break


    }


}
