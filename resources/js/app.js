require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

let app = {};

app.copyToClipboard = function(text){

    if (navigator.clipboard !== undefined) {
        navigator.clipboard.writeText(text);
    } else {

        let input = document.createElement('input');
        input.value = text;
        document.body.appendChild(input);
        input.select();

        try {
            document.execCommand('copy');
            document.body.removeChild(input);
            return true;
        } catch (err) {
            document.body.removeChild(input);
            return false;
        }

    }

};

app.flash = function(el){
    console.log('fhasl');
    el.toggleClass('change');
};

app.bind = function(){

    $('.copy-clipboard').off().on('click', function(){

        let text = $(this).data('text');
        let result = app.copyToClipboard(text);

        // Flash 'Copied' to button.
        if (result === true) {
            $(this).text('Copied!');
            app.flash($(this));
            setTimeout(function(el){
                app.flash(el);
                el.text('Copy');
            }, 2000, $(this));
        } else {

        }

    });

    $('.toggle').off().on('click', function(){

        let target = $(this).data('target');
        $(target).slideToggle();

    });

};

app.init = function(){

    console.log('INIT');
    app.bind();

};

window.app = app;

// Load what needs loading.
window.onload = function () {

    // Init.
    app.init();

};
