$( document ).ready(function() {
    console.log( "ready!" );
    $('#addExperience').hide();
    $('#addTask').hide();
    $('#addParcelle').hide();
    $("#image").click(function() {
        $("#addExperience").show();
        $('#aaa').hide();
    });
    $("#imageTask").click(function() {
        $("#addTask").show();
        $('#ccc').hide();
    });
    $("#imageParcelle").click(function() {
        $("#addParcelle").show();
        $('#frr').hide();
        $('.ee').hide();
    });
});