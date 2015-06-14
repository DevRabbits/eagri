$( document ).ready(function() {
		var open = 0;
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
		$('.deroulant').click(function()
		{
			if (open == 0)
			{
				$(".morede").css("display", "block");
				open = 1;
			}
			else
			{
				$(".morede").css("display", "none");
				open = 0;
			}
		});
});
