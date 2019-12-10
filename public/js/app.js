function JS_Library(){}

toastr.options = {
  "positionClass": "toast-top-center",
}

JS_Library.prototype.showloading = function(){
    let html = '<div class="app-loading">Loading&#8230;</div>';
    // let html = '<div class="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
    $("#app-loading").html(html);
}

JS_Library.prototype.hideloading = function(){
    $("#app-loading").html('');
}

JS_Library.prototype.hideloading = function(){
    $("#app-loading").html('');
}

JS_Library.prototype.notify = function(message, type){
    if (type == 'error') {
        toastr.error(message);
    } else if (type == 'success') {
        toastr.success(message);
    }
}

var JS_Library = new JS_Library();