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

	});