$(document).ready(function () {
    $('#checkAllBoxes').click(function (event) {
        if (this.checked) {
            $('.checkBox').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkBox').each(function () {
                this.checked = false;
            });
        }
    });

});

$(document).ready(function () {
    $('#summernote').summernote({
        height: 200
    });
});

function loadUsersOnline(){

    $.get("includes/functions.php?onlineusers=result", function(data){
        $(".usersonline").text(data);
    });
  
}

setInterval(function(){
    loadUsersOnline();
},500);

$(document).ready(function() {
    $("#myModal").modal("show");
});