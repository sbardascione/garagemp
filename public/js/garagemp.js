$(document).ready(function(){

	$('[name="brand"]').change(
		function(){

			var brand_id = this.value;

            var name = $("select[name=category] option:selected").text();

			$.ajax({
				type:'GET',
				url: '/search/'+name+'/getModelsSelect',
                data:{brand_id: brand_id},
				dataType: 'json',
				success: function(data){

                    $("select[name = car_model]").empty();

                    $.each(data,function(key,val){
                        $("<option />",{
                            val: key,
                            text: val
                        }).appendTo($("select[name = car_model]"));
                    });
				},
				error: function(error){
					alert(error);
				}
			 },"json");
			
		});

    $('[name="car_model"]').change(
        function(){

            var model_id = this.value;

            var name = $("select[name=category] option:selected").text();

            $.ajax({
                type:'GET',
                url: '/search/'+name+'/getEnginesSelect',
                data:{model_id: model_id},
                dataType: 'json',
                success: function(data){

                    $("select[name = engine]").empty();

                    $.each(data,function(key,val){
                        $("<option />",{
                            val: key,
                            text: val
                        }).appendTo($("select[name = engine]"));
                    });
                },
                error: function(error){
                    alert(error);
                }
            },"json");

        });

    $('#search').click(
        function(){

            var engine_id = $("select[name=engine]").val();

                var name = $("select[name=category] option:selected").text();

                $.ajax({
                    type:'GET',
                    url: '/search/'+name+'/getDataSheetsSelect',
                    data:{engine_id: engine_id},
                    dataType: 'text',
                    success: function(data){
                        $('#result').slideUp("slow");
                        $('#result').html(data);
                        $('#result').slideDown("slow");
                    },
                    error: function(error){
                        alert(error);
                    }
                });


        });

	});

function getfile(pdf_id)
{
    var name = $("select[name=category] option:selected").text();

    $.ajax({
        type:'GET',
        url: '/search/'+name+'/getPdf',
        data:{pdf_id: pdf_id},
        error: function(error){
            alert(error);
        }
    });
}

function showErrorMessage(msg)
{
    delay = 5000;
    $("#ajax_confirmation")
        .html("<div class=\"error\">"+msg+"</div>").show().delay(delay).fadeOut("slow");
}
