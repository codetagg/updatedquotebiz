<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FormWizard_v4</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
		<link rel="stylesheet" href="{{ asset('frontend-assets/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">
	
		<!-- STYLE CSS -->
		<link id="skin-default" rel="stylesheet" href="{{ asset('frontend-assets/css/style2.css') }}">
		<style>
		<?php
		// dd(count($category->questions)); 
		  $total = count($category->questions) + 1;
		  $mid = 90/$total;
		  $final = 100/count($category->questions);
		 
		  for($i=1; $i < $total; $i++){ ?>
		
		 .wizard > .steps ul.step-<?php echo $i+1; ?>:before {
			left:<?php echo $i*$mid; ?>%;
			transition: all 0.5s ease; }
		  .wizard > .steps ul.step-<?php echo $i+1; ?>:after {
			width: <?php echo $i*$final; ?>%;
			transition: all 0.5s ease; }
		<?php } ?>

		.mainclass {
		  display: flex;
		  flex-flow: row wrap;
		}
		.mainclass > div {
		  flex: 1;
		  padding: 0.5rem;
		  max-width: 25%;
		}
		input[type="radio"] {
		  display: none;
		  &:not(:disabled) ~ label {
		    cursor: pointer;
		  }
		  &:disabled ~ label {
		    color: black;
		    border-color: hsla(150, 5%, 75%, 1);
		    box-shadow: none;
		    cursor: not-allowed;
		  }
		}
		input[type="checkbox"] {
		  display: none;
		  &:not(:disabled) ~ label {
		    cursor: pointer;
		  }
		  &:disabled ~ label {
		    color: black;
		    border-color: hsla(150, 5%, 75%, 1);
		    box-shadow: none;
		    cursor: not-allowed;
		  }
		}
		label {
		  height: 100%;
		  display: block;
		  background: white;
		  /*border-radius: 20px;*/
		  padding: 1rem;
		  color: black;
		  margin-bottom: 1rem;
		  //margin: 1rem;
		  text-align: center;
		  box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
		  position: relative;
		}
		input[type="radio"]:checked + label {
		  /*background: hsla(150, 75%, 50%, 1);*/
		  color: black;
		  border: 1px solid #843ff2;
		  &::after {
		    color:black;
		    font-family: FontAwesome;
		    border: 2px solid hsla(150, 75%, 45%, 1);
		    content: "\f00c";
		    font-size: 24px;
		    position: absolute;
		    top: -25px;
		    left: 50%;
		    transform: translateX(-50%);
		    height: 50px;
		    width: 50px;
		    line-height: 50px;
		    text-align: center;
		    border-radius: 50%;
		    background: white;
		    box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
		  }
		}
		input[type="checkbox"]:checked + label {
		  /*background: hsla(150, 75%, 50%, 1);*/
		  color: black;
		  border: 1px solid #843ff2;
		  &::after {
		    color: black;
		    font-family: FontAwesome;
		    border: 2px solid hsla(150, 75%, 45%, 1);
		    content: "\f00c";
		    font-size: 24px;
		    position: absolute;
		    top: -25px;
		    left: 50%;
		    transform: translateX(-50%);
		    height: 50px;
		    width: 50px;
		    line-height: 50px;
		    text-align: center;
		    border-radius: 50%;
		    background: white;
		    box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
		  }
		}
		/*input[type="radio"]#control_05:checked + label {
		  background: red;
		  border-color: red;
		}*/
		p {
		  font-weight: 900;
		}

.d-flex {
    display: flex;
}
.justify-content-center {
    justify-content: center;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
@media only screen and (min-width: 992px) {
.col-md-6 {
    width: 50%;
    float: left;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

}
@media only screen and (max-width: 700px) {
  section {
    flex-direction: column;
  }
  .mainclass > div {
    flex: 1;
    padding: 0.5rem;
    max-width: 50%;
}
}
		</style>
	</head>
	<body>
	
		<div class="wrapper">
			
            <form action="{{ action('QuestionChoiceController@storeform') }}" method="post" id="form">
            	 {{ csrf_field() }}
            	<div class="form-header">
            		<a href="#" style="margin-bottom: 20px">#{{$category->category_name}} Quote Questions</a>
            		
            	</div>
            	<div id="wizard">
            	
				@foreach($category->questions as $question)
            		<!-- SECTION 1 -->
	                <h4></h4>
	                <section>
	                	<h3 style="text-align: center;color: black">{{$question->question}}</h3>
	                	<div class="mainclass">
	                @foreach($question->choices as $choices)
	                @if($question->choice_selection == "single")		
	                  <div>
					  <input type="radio" id="control_0{{$choices->id}}" name="select[]" value="{{$question->id }},{{$choices->id }}" checked>
					  <label for="control_0{{$choices->id}}">
					  	<img src="{{ asset('/frontend-assets/images/categories/'.$choices->icon) }}">
					    <h2>{{$choices->choice}}</h2>
					   
					  </label>
					</div>
					@else
                     <div>
					  <input type="checkbox" id="control_0{{$choices->id}}" name="select[]" value="{{$question->id}},{{$choices->id }}">
					  <label for="control_0{{$choices->id}}">
					  	<img src="{{ asset('/frontend-assets/images/categories/'.$choices->icon) }}">
					    <h2>{{$choices->choice}}</h2>
					   
					  </label>
					</div>

					@endif
					@endforeach
					
				</div>
	                </section>
				@endforeach
					
	                <!-- SECTION 3 -->
	                <h4></h4>
	                <section>
	                	<h3 style="text-align: center;color: black">Alright, let's get your details and create your tailored online estimate!</h3>
	                	<div class="row">
	                		
	                    <div class="form-row col-md-6">
	                    	
	                    	<div class="form-holder">
	                    		<span>First Name</span>
	                    		<input type="text" class="form-control" name="firstname" placeholder="Enter First Name">
	                    	</div>
	                    </div>	
	                    <div class="form-row col-md-6">
	                    	
	                    	<div class="form-holder">
	                    		<span>Last Name</span>
	                    		<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name">
	                    	</div>
	                    </div>	
                     	<div class="form-row col-md-6">
	                    	
	                    	<div class="form-holder">
	                    		<span>Email</span>
	                    		<input type="email" class="form-control" name="email" placeholder="Enter Email">
	                    	</div>
	                    </div>	
	                    <div class="form-row col-md-6" style="margin-bottom: 38px">
	                    	
	                    	<div class="form-holder">
	                    		<span>Phone No</span>
	                    		<input type="number" class="form-control" placeholder="Enter Phone No">
	                    	</div>
	                    </div>
	                    	<div class="form-row col-md-6">
	                    	
	                    	<div class="form-holder">
	                    		<span>Password</span>
	                    		<input type="text" class="form-control" placeholder="Enter Password">
	                    	</div>
	                    </div>	
	                    <div class="form-row col-md-6" style="margin-bottom: 38px">
	                    	
	                    	<div class="form-holder">
	                    		<span>Address</span>
	                    		<input type="text" class="form-control" placeholder="Enter Address">
	                    	</div>
	                    </div>		
	                   
	                	</div>
	                </section>
					
            	</div>
            </form>
		</div>

		  
		<script src="{{ asset('frontend-assets/js/jquery-3.3.1.min.js') }}"></script>
		
		<!-- JQUERY STEP -->
		<script src="{{ asset('frontend-assets/js/jquery.steps.js') }}"></script>


		<script>
		$(function(){
	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex) { 
		<?php
		$total = count($category->questions) + 1;
		for($i =1; $i < $total; $i++){ ?>
            if ( newIndex === <?php echo $i; ?> ) {
                $('.wizard > .steps ul').addClass('step-<?php echo $i+1; ?>');
            } else {
                $('.wizard > .steps ul').removeClass('step-<?php echo $i+1; ?>');
            }
           
		<?php } ?>
            return true; 
        },
        onFinished: function (event, currentIndex) {
		  $("#form").submit();
		  // alert('hell');
		},
        labels: {
            finish: "Submit",
            next: "Continue",
            previous: "Back"
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Date Picker
    var dp1 = $('#dp1').datepicker().data('datepicker');
    dp1.selectDate(new Date());
})

		</script>
<!-- Template created and distributed by Colorlib -->
</body>
</html>