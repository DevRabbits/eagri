$( document ).ready(function() {
    console.log( "ready!" );
    $('#addExperience').hide();
    $('#addTask').hide();
    $("#image").click(function() {
        $("#addExperience").show();
        $('#aaa').hide();
    });
    $("#imageTask").click(function() {
        $("#addTask").show();
        $('#ccc').hide();
    });
});