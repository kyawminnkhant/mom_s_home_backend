$(document).ready(function() {
    var max_fields_limit = 50; //set limit for maximum input fields
    var x = 2; //initialize counter for text box
    
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
    e.preventDefault();
    if(x < max_fields_limit){ //check conditions
    var ingredient = '<div class="col-sm-4"><select name="ingredients['+x+']" class="form-control"><option value="">Choose Ingredients</option> @foreach ($ingredients as $ingre)<option value="{{ $ingre->id }}">{{ $ingre->name }}</option>@endforeach</select></div>';
    var amount = '<div class="col-sm-3"><input type="number" name="amount['+x+']" class="form-control" placeholder="Enter amount"></div>';
    var unit = '<div class="col-sm-4"><input type="text" name="unit['+x+']" class="form-control" placeholder="Enter unit"></div>';
    x++; //counter increment
    $('.add-new-component').append($('<div class="row" style="margin-top:10px;">'+ingredient+amount+unit+'<a href="#" class="remove_field" style="margin-left:10px;"><i class="fas fa-times" style="color:red;"></i></a></div>'));
    }
    }); 
    $('.add-new-component').on("click",".remove_field", function(e){ //user click on remove text links
    e.preventDefault(); $(this).parent('div').remove(); x--;
    })
    });